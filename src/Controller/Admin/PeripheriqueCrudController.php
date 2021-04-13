<?php

namespace App\Controller\Admin;

use App\Entity\Peripherique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PeripheriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peripherique::class;
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
