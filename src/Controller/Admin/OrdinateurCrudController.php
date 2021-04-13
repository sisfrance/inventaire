<?php

namespace App\Controller\Admin;

use App\Entity\Ordinateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrdinateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ordinateur::class;
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
