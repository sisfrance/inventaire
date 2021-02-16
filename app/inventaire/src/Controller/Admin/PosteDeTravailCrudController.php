<?php

namespace App\Controller\Admin;

use App\Entity\PosteDeTravail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PosteDeTravailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PosteDeTravail::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('emplacement'),
            AssociationField::new('ordinateur'),
        ];
    }
    
}
