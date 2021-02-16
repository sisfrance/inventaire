<?php

namespace App\Controller\Admin;

use App\Entity\Peripherique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PeripheriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peripherique::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/         
            AssociationField::new('type_peripherique'),
            AssociationField::new('modele'),
            TextField::new('reference'),
            TextField::new('serialnumber'),
            AssociationField::new('emplacement'),
            TextField::new('ipadresse'),
            TextEditorField::new('notes'),
        ];
    }
    
}
