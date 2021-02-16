<?php

namespace App\Controller\Admin;

use App\Entity\Os;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Os::class;
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
