<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Filesystem\Filesystem;


use App\Entity\User;
use App\Form\UserType;
use App\Entity\Category;
use App\Form\CategoryType;



class AdminController extends AbstractController
{

    
/**
* ***************
* CATEGORY MANAGEMENT
* ***************
*/
    /**
     *
     * @Route ("/admin", name="admin")
     */
    public function home (){
        
        
        return $this->render ('admin/index.html.twig');
    }
    /**
     * @Route("admin/category/delete/{id}", name="category-delete")
     
     */
    public function DelCategory(Category $category,Request $request, ObjectManager $om,FileSystem $filesystem)
    {
        $file = $category->getIcon();
        $filesystem->remove('uploads/icons/'.$file);
        $om->remove($category);
        $om->flush();
        return $this->redirectToRoute('categories');
    }
    
    
    
    
    /**
     * @Route("admin/category/new", name="category-new")
     * @Route("admin/category/{id}", name="category-update")
     
     */
    public function Category($id=null,Category $category=null,Request $request, ObjectManager $om)
    {
        if  (!$category) {
            // create a new actor entity
            $category= new Category();
            $category->setIconName('unknown.png');
        }else {
            $repo=$om->getRepository(Category::class);
            $category=$repo->find($id);
        }
        dump( $category->getIconName());
        
        $icon=$category->getIconName();
        
        //  create FormBuilder from form factory service
        $formCategory = $this->createForm(CategoryType::class, $category);
        $formCategory->handleRequest($request);
        
        if ($formCategory->isSubmitted() && $formCategory->isValid()) {
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $category->getIcon();
            $fileName = $file->getClientOriginalName();   // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter('icons_directory'),$fileName
                    );
                $category->setIconName($fileName) ;
                $om->persist($category);
                $om->flush();
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            
            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            // ... persist the $product variable or any other work
            
            return $this->RedirectToRoute('categories');
        }
        
        
        
        return $this->render('admin/category-create.html.twig',  [
            'form' => $formCategory->createView(),
            'icon' =>$icon
        ]);
    }
    /**
     * @Route("admin/categories", name="categories")
     */
    public function AllCategory(Request $request, ObjectManager $om)
    {
        $repo=$this->getDoctrine()->getRepository(Category::class);
        $allcategory=$repo->findAll();
        return $this->render('front/allcategory.html.twig', [ 'allcategory'=> $allcategory
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
        $om->flush();
        $this->addFlash(
            'alert-warning',
            'l\'utilisateur a été supprimé !'
            );
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
                $this->addFlash(
                    'alert-success',
                    'l\'utilisateur a été crée !!'
                    );
                return $this->redirectToRoute('users');
                
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
