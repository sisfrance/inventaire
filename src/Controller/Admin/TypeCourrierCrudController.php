<?php

namespace App\Controller\Admin;

use App\Entity\TypeCourrier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCourrierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeCourrier::class;
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
