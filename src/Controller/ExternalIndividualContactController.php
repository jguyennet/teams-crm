<?php

namespace App\Controller;

use App\Entity\SearchExternalIndividualContact;
use App\Form\SearchExternalIndividualContactType;
use App\Repository\ExternalIndividualContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExternalIndividualContactController extends Controller
{
    /**
     * @Route("/external-individual-contact", name="external-individual-contact")
     */
    public function index(ExternalIndividualContactRepository $repoExternalIndividualContact, Request $request): Response
    {
        $externalIndividualContacts = $repoExternalIndividualContact->findAll();
        
        $search = new SearchExternalIndividualContact();
        $form = $this->createForm(SearchExternalIndividualContactType::class, $search);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $externalIndividualContacts = $repoExternalIndividualContact->findWithSearch($search);
        }

        return $this->render('external_individual_contact/index.html.twig', [
            'controller_name' => 'ExternalIndividualContactController',
            'externalIndividualContacts' => $externalIndividualContacts,
            'search' => $form->createView()
        ]);
    }
}
