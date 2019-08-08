<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\Common\Persistence\ObjectManager;
use RogerioLino\Doctrine\GeoJson;

use Symfony\Component\HttpFoundation\JsonResponse;


use App\Entity\Entry;
use App\Form\EntryType;
use App\Entity\Searchproperties;

use App\Form\SearchpropertiesType;

use App\Repository\EntryRepository;
use App\Repository\CategoryRepository;


use App\Entity\Category;
use App\Form\CategoryType;



class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function index(EntryRepository $entryrepo, CategoryRepository $category)
    {
        $user = $this->getUser();
        $entries=$entryrepo->findBy(['publish'=>'1']);
        return $this->render('front/index.html.twig', [
            'actors' => $entries
        ]);
        
    }
    

    /**
     * @Route("/getentries", name="getentries",methods={"POST"})
     **/
    public function entries(Request $request,EntryRepository $entryrepo, CategoryRepository $category)
    {
        $user = $this->getUser();
       // $entries=$entryrepo->findBy(['publish'=>'1']);
        //////////////////////
        $categories=$category->findAll();
        $tab=[];
        foreach ($categories as $catrepo){
            $catid=$catrepo->getId();
            $catname=$catrepo->getName();
            $catdesc=$catrepo->getDescription();
            $caticon=$catrepo->getIconName();
            $entries= $entryrepo->findByCat($catid);
            $geoJsonlist=[];
            $geoJsonlist["type"]="FeatureCollection";
            $nbc= count($entries);
            if ($nbc !=0){
                
                foreach ($entries as $entry){
                    $geoJsonMarker=[];
                    $geoJsonMarker["type"]="Feature";
                    $wsg=[];
                    array_push($wsg,$entry->getLat());
                    array_push($wsg,$entry->getLng());
                    $fields["wgs84"]=$wsg;
                    $fields["name"]=$entry->getName();
                    $fields["logo"]= $entry->getLogo();
                    $fields["id"]= $entry->getId();
                    $fields["website"]= $entry->getWebsite();
                    $fields["mail"]=$entry->getMail();
                    $fields["description"]=$entry->getDescription();
                    $fields["adresse"]=$entry->getAddress();
                    $fields["telephone"]=$entry->getPhone();
                    $fields["longitude"]=$entry->getLng();
                    $fields["latitude"]=$entry->getLat();
                    $tmp="";
                    foreach ($entry->getCategories() as $cattmp){
                        $tmp=$tmp.$cattmp->getName().' ';
                    }
                    $fields["categories"]=$tmp;
                    
                    $geoJsonMarker["properties"]=$fields;
                    $geometry["type"]="Point";
                    $geo=[];
                    array_push($geo,$entry->getLng());
                    array_push($geo,$entry->getLat());
                    $geometry["coordinates"]=$geo;
                    $geoJsonMarker["geometry"]= $geometry;
                    
                    $geoJsonlist["features"][]=$geoJsonMarker;
                    
                
                
            }
            $tab[$catid]=['name'=>$catname,'icon'=>$caticon,'description'=>$catdesc,'geojsonlist'=>$geoJsonlist];
            }
            
            
           
            //    return $this->json([$geoJsonlist],200);
        }
        $entriesmarker=json_encode($geoJsonlist);
        $tab1=json_encode($tab);
        return new JsonResponse(['list'=>$entriesmarker, 'tab' => $tab1]);
        
    }
    
  
////////////////////
    
    /**
     *
     * @Route ("/login", name="login")
     */
    public function Login (){
        
        
        return $this->render ('front/login.html.twig');
    }


    
    
    
    // Actor Management
    
    
    /**
     * @Route("/actors", name="actors")
     */
    public function Entrieslist(Request $request)
    {
        $repo=$this->getDoctrine()->getRepository(Entry::class);
        $user = $this->getUser();
        $search= new Searchproperties();
        $form = $this->createForm(SearchpropertiesType::class, $search);

        $form->handleRequest($request);
        
        if (null !== $user) {
        $actors=$repo->findAll();
        }
        else {
        $actors=$repo->findBy(['publish'=>'1']);
            
        }
        return $this->render('front/actors.html.twig', [
            'actors' => $actors,
            'form' =>$form->createView()
        ]);
    }
    
    
    
    /**
     * @Route("/actor/new", name="actor-new")
     * @Route("/actor/{id}", name="actor-update")
     
     */
    public function Entry(Entry $entry=null, Request $request, ObjectManager $om)
    {
        // create a new actor entity
        if (!$entry) {
            $entry= new Entry();
            
        }
        
        $user = $this->getUser();
        $form = $this->createForm(EntryType::class, $entry);
        if (null !== $user) {
            $form->add('publish');
        }
      
        //  create FormBuilder from form factory service

        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
          
            $om->persist($entry);
            $om->flush();
            $this->addFlash(
                'alert-success',
                'nouvel acteur enregistré !'
                );
            return $this->redirectToRoute('actors');
            
        }else {
         
               return $this->render('front/actor-create.html.twig',  [
                    'formActor' => $form->createView()
            ]);
        }
        
    }
    /**
     * @Route("/actor/view/{id}", name="actor-view")
     */
    public function Entryview($id,Request $request, ObjectManager $om)
    {
        $repo= $this->getDoctrine()->getRepository(Entry::class);
        $entry=$repo->find($id);
        
        return $this->render('front/actor.html.twig',  [
            'actor' => $entry
        ]);
    }
    
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

   
    ////////////////////
    
    
    /**
     *
     * @Route ("/legalnotice", name="legalnotice")
     */
    public function Legalnotice (){
        
        
        return $this->render ('front/legalnotice.html.twig');
    }
    
    
    
    
    
    
}
