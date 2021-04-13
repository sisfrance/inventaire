<?php

namespace App\Controller\Admin;

use App\Entity\TypeOrdinateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeOrdinateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeOrdinateur::class;
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
