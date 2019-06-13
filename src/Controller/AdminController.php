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
 * @Route("/admin/users", name="users")
*/
    public function Alluser( Request $request, ObjectManager $om)
    {
        $repo = $om->getRepository(User::class);
        $users=$repo->findAll();
        return $this->render('admin/users.html.twig',[
            'registered' => $users]);
    }
    
    /**
    * @Route("admin/user/delete/{id}", name="user-delete")
    */
    public function Deluser($id, Request $request, ObjectManager $om)
    {
        $repo = $om->getRepository(User::class);
        $om->remove($repo->find($id));
        return $this->redirectToRoute('users');
    }
    
    
/**
 * @Route("admin/user/new", name="user-new")
 * @Route("admin/user/{id}", name="user-edit")
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
    

/**
* ***************
* CATEGORY MANAGEMENT
* ***************
 */
    /**
     *
     * @Route ("/admin/category/{id}",name="category-update")
     * @Route ("/admin/catégory/new", name="category-new")
     */
    public function Cat (){
        
        
        return $this->render ('admin/login.html.twig');
    }
    
    
    /**
     *
     * @Route ("/delete/catégory/{id}", name="category-update")
     */
    public function del (){
        
        
        return $this->render ('admin/login.html.twig');
    }

    
}
