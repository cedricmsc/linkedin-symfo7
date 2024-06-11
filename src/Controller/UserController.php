<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
//use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
   //#[Route('/user', name: 'app_user')] -ON travail

    public function index(): Response
    {   
        $tab1 = ['Aubergine','Haricots','Salade'];

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'list' => $tab1
        ]);
    }

    #[Route('/category/{id<\d+>}', name:'category')]
    public function getCategorie(int $id)
    {
        $category_id = $id;
        return $this->render('category.html.twig',['id_category' => $category_id]);
    }

    #[Route('/pages', name:'pages')]
    public function getPages()
    {
        return $this->render('page.html.twig',[]);

    }




}
