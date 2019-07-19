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
     * @Route("/test", name="front2")
     */
    public function index2(EntryRepository $entryrepo, CategoryRepository $category)
    {
        $user = $this->getUser();
        return $this->render('front/index3.html.twig', [
        ]);
        
    }
    /**
     * @Route("/getentries", name="getentries",methods={"POST"})
     **/
    public function entries(Request $request,EntryRepository $entryrepo, CategoryRepository $category)
    {
        $user = $this->getUser();
        $entries=$entryrepo->findBy(['publish'=>'1']);
        //////////////////////
       $nbc= count($entries);
        if ($nbc==0) {
            return $this->json(['entries' =>'aucun acteur publiable pour cette carte '],200);      
        }else {
            $geoJsonlist=[];
            
            foreach ($entries as $entry){
                    $categories= $entry->getCategories();
                    $geoJsonMarker=[];
                    $geoJsonMarker["datasetid"]="ApfActors";

                    $i=0;
                    foreach ($categories as $category) {
                        $i=$i+1;
                        $name=$category->getName();
                        $id=$category->getId();
                        
                        $cat="categorie".$i;
                        $caticon="categorieicon".$i;
                        $catdesc="categoriedescription".$i;
                        $catid="categorieid".$i;
                        $fields[$catid]=$id;
                        $fields[$cat]=$name;
                        $fields[$caticon]=$category->getIconName();
                        $fields[$catdesc]=$category->getDescription();
                        
                        
                    }
                    $fields["wgs84"]=[$entry->getLat().','.$entry->getLng()];
                    $fields["name"]=$entry->getName();
                    $fields["logo"]= $entry->getLogo();
                    $fields["website"]= $entry->getWebsite();
                    $fields["mail"]=$entry->getMail();
                    $fields["description"]=$entry->getDescription();
                    $fields["adresse"]=$entry->getAddress();
                    $fields["telephone"]=$entry->getPhone();
                    $fields["longitude"]=$entry->getLng();
                    $fields["latitude"]=$entry->getLat();
                    
                    $geoJsonMarker["properties"]=$fields;
                    
                    $geoJsonMarker["type"]="Point";
                    $geoJsonMarker["coordinates"]=['.$entry->getLat().','.$entry->getLng().'];
                    $geoJsonMarker["geometry"]= array();
                    $geoJsonMarker["geometry"].push($geoJsonMarker["type"]);
                    $geoJsonMarker["geometry"].push($geoJsonMarker["coordinates"]);


                    $geoJsonlist[]=$geoJsonMarker;
                    
                
            }
            $entriesmarker=$geoJsonlist;
            return new JsonResponse($entriesmarker);
        //    return $this->json([$geoJsonlist],200);       
        }
        
       
        
        
        
        //////////////////////
        
    }
    
    /**
     * @Route("/getentries2", name="getentries2",methods={"POST"})
     **/
    public function entries2(Request $request,EntryRepository $entryrepo, CategoryRepository $category)
    {
        $user = $this->getUser();
        $entries=$entryrepo->findBy(['publish'=>'1']);
        //////////////////////
        $nbc= count($entries);
        if ($nbc==0) {
            return $this->json(['entries' =>'aucun acteur publiable pour cette carte '],200);
        }else {
            $geoJsonlist=[];
            $geoJsonlist["type"]="FeatureCollection";
            foreach ($entries as $entry){
                $categories= $entry->getCategories();
                $geoJsonMarker=[];
                $geoJsonMarker["type"]="Feature";
                $i=0;
                foreach ($categories as $category) {
                    $i=$i+1;
                    $name=$category->getName();
                    $id=$category->getId();
                    
                    $cat="categorie".$i;
                    $caticon="categorieicon".$i;
                    $catdesc="categoriedescription".$i;
                    $catid="categorieid".$i;
                    $fields[$catid]=$id;
                    $fields[$cat]=$name;
                    $fields[$caticon]=$category->getIconName();
                    $fields[$catdesc]=$category->getDescription();
                    
                    
                }
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
                $geoJsonMarker["properties"]=$fields;
                $geometry["type"]="Point";
                $geo=[];
                array_push($geo,$entry->getLng());
                array_push($geo,$entry->getLat());
                $geometry["coordinates"]=$geo;
                $geoJsonMarker["geometry"]= $geometry;
                
                
                
                
                
                
                $geoJsonlist["features"][]=$geoJsonMarker;
                
                
            }
            
            
            $entriesmarker=json_encode($geoJsonlist);
            return new JsonResponse($entriesmarker);
            //    return $this->json([$geoJsonlist],200);
        }
        
        
        
        
        
        //////////////////////
        
    }
    
    /**
     *
     * @Route ("/login", name="login")
     */
    public function Login (){
        
        
        return $this->render ('admin/login.html.twig');
    }


    
    
    
    // Actor Management
    
    
    /**
     * @Route("/actors", name="actors")
     */
    public function Entrieslist()
    {
        $repo=$this->getDoctrine()->getRepository(Entry::class);
        $user = $this->getUser();
        if (null !== $user) {
        $actors=$repo->findAll();
        }
        else {
        $actors=$repo->findBy(['publish'=>'1']);
            
        }
        return $this->render('front/actors.html.twig', [
            'actors' => $actors
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

    
    
    
    
}
