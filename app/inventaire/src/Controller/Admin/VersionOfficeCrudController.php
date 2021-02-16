<?php

namespace App\Controller\Admin;

use App\Entity\VersionOffice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VersionOfficeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VersionOffice::class;
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
