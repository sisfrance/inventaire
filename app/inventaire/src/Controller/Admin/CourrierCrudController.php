<?php

namespace App\Controller\Admin;

use App\Entity\Courrier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CourrierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Courrier::class;
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
