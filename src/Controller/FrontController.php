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

use App\Entity\Category;
use App\Form\CategoryType;


class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function index()
    {
       
       
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
        
    }
    
    /**
     * @Route("/getentries", name="getentries",methods={"POST"})
     **/
    public function entries(EntryRepository $entryrepo, Geojson $geojson)
    {
        $user = $this->getUser();
        $entries=$entryrepo->findBy(['publish'=>'1']);
        //////////////////////
       $nbc= count($entries);
        if ($nbc==0) {
            return JsonResponse::fromJsonString('aucun acteur publiable pour cette carte ');
        }else {
            $geoJsonlist=[];
            foreach ($entries as $entry){
                $cat=$geojson->
                $cat=$entry->getLogo().
                $geoJsonMarker= '{
                    "datasetid": "ApfActor",
                    "recordid": "ef6036c22c658a7e9ec5417cbc87fb3f92dcbd42",
                    "fields": {
                    "wgs84": ['.$entry->getLat().','.$entry->getLng().'],
                    "nom": "'.$entry->getName().'",
                    "logo": "'.$entry->getLogo().'",
                    "website": "'.$entry->getWebsite().'",
                    "mail": "'.$entry->getMail().'",
                    "description": "'.$entry->getDescription().'",
                    "adresse": "'.$entry->getAddress().'",
                    "telephone": "'.$entry->getPhone().'",
                    "longitude": '.$entry->getLng().',
                    "latitude": '.$entry->getLat().',
                    "categorie3": "Coiffeurs",
                    "categorie2": "Commerces, consommation"
                    },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [2.249327, 48.822435]
                    },
                    "record_timestamp": "2014-08-13T22:12:23+00:00"
                }';
                $geoJsonlist[]=$cat;
               
                
            }
            return $this->json(['entries' =>$geoJsonlist],200);        }
            
        
       
        
        
        
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
