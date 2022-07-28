<?php

namespace App\Controller\Admin;

use App\Entity\AdresseMail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdresseMailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AdresseMail::class;
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
