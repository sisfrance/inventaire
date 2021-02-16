<?php

namespace App\Controller\Admin;

use App\Entity\TypePeripherique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypePeripheriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypePeripherique::class;
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
