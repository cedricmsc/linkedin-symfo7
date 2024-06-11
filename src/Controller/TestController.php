<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

   class TestController extends AbstractController{
        public function salutations(){

        return new Response("Je vous salue les gars et les potes");
        }

        public function aurevoir(){
            return $this->redirectToRoute('salutation');

        }

        public function redirect_(){
            return $this->redirect('https://stdplus.net/');

        }

        public function showTemplate()
        {
            return $this->render('base.html.twig',[

            ]);
        }
             
        #[Route("/products", name:"products_List")]

        public function showproducts()
        {
            $products = ['ordinateur','telephone','radio','cassette'];

            return $this->render('product.html.twig', [
                'products' => $products
            ]);
        }
   
   
   
   
   
    }
