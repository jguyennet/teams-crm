<?php

namespace App\Controller;

use App\Repository\ExternalIndividualContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExternalIndividualContactController extends Controller
{
    /**
     * @Route("/external-individual-contact", name="external-individual-contact")
     */
    public function index(ExternalIndividualContactRepository $repoExternalIndividualContact): Response
    {
        $externalIndividualContacts = $repoExternalIndividualContact->findAll();
        // dd($externalIndividualContacts);
        return $this->render('external_individual_contact/index.html.twig', [
            'controller_name' => 'ExternalIndividualContactController',
            'externalIndividualContacts' => $externalIndividualContacts,
        ]);
    }
}
