<?php

namespace App\Controller\Admin;

use App\Entity\Peripherique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class PeripheriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peripherique::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            TextField::new('reference'),
            AssociationField::new('modele'),
            TextField::new('serial_number'),
            TextField::new('adresse_ip'),
            TextEditorField::new('notes'),
            AssociationField::new('type_peripherique'),
            AssociationField::new('emplacement'),
            
        ];
    }
    
}
