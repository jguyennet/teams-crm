<?php

namespace App\Controller\Admin;

use App\Entity\LegalEntityContact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LegalEntityContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LegalEntityContact::class;
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
