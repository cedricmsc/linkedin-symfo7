<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Services\MyHelper;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CustomerController extends AbstractController
{
    #[Route('/formcustomer', name: 'formcustomer')]
    public function index(Request $request, ManagerRegistry $doctrine, LoggerInterface $logger, MyHelper $helper)
    {
        $date = $helper->getTheDate();
        $customer = new Customer();
        $customerForm = $this->createForm(CustomerType::class, $customer);

        // handleRequest - Méthode appelée à la soumission du formulaire
        $customerForm->handleRequest($request); 

        //Vérification de la validité du formulaire
        if($customerForm->isSubmitted() && $customerForm->isValid())
        {
            // $entityManager récupère l'instance ManagerRegisty $doctrine avec la méthode getManager()
            $entityManager = $doctrine->getManager();

            // $client récupère les données du formulaire quand le soumet avec la méthode getData()
            $client =$customerForm->getData();
            $logger->log('info','Un client a été ajouté');

             // On prépare les données à la table client
            $entityManager->persist($client);

            // On fait l'insertion à notre bdd
            $entityManager->flush();
        }

        return $this->render('customer/index.html.twig', [
           'customerForm' =>  $customerForm ->createView(),
           'date'=> $date
        ]);
    }
}
