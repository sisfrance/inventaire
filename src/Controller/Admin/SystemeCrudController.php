<?php

namespace App\Controller\Admin;

use App\Entity\Systeme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SystemeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Systeme::class;
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
