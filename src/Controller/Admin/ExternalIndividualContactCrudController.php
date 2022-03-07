<?php

namespace App\Controller\Admin;

use App\Entity\ExternalIndividualContact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExternalIndividualContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ExternalIndividualContact::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
