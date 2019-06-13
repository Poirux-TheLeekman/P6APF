<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


use App\Entity\User;
use App\Form\UserType;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    
    
/**
 * ***************
 * USER MANAGEMENT
 * ***************
 */
    
/**
 * @Route("/user/new", name="user-new")
 * @Route("/user/{}", name="user-edit")
 */
    public function User(User $user=null, Request $request, ObjectManager $om,UserPasswordEncoderInterface $encoder)
    {
        // create a new actor entity
        if (!$user) {
            $user= new User();
            
        }
        //  create FormBuilder from form factory service
        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);
        
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            
            $pwd=$encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($pwd);
            $om->persist($user);
            $om->flush();
            
            return $this->redirectToRoute('login');
            
        }else {
            return $this->render('admin/registration.html.twig',  [
                'form' => $formUser->createView()
            ]);
        }
        
    }
    
    /**
     *
     * @Route ("/login", name="login")
     */
    public function Login (){
        
        
        return $this->render ('admin/login.html.twig');
    }
    
    /**
     *
     * @Route ("/deconnexion", name="logout")
     */
    public function Logout (){
        
        
    }
    
    
    
}
