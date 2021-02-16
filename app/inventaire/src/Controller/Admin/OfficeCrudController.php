<?php

namespace App\Controller\Admin;

use App\Entity\Office;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class OfficeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Office::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('courrier'),
            AssociationField::new('version_office'),
            AssociationField::new('ordinateur'),
        ];
    }
    
}
