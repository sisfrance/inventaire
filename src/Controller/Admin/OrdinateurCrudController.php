<?php

namespace App\Controller\Admin;

use App\Entity\Ordinateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class OrdinateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ordinateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            TextField::new('nom'),
            TextField::new('serial_number'),
            TextField::new('memoire'),
            DateField::new('date_achat'),
            TextField::new('adresse_ip'),
            TextEditorField::new('notes'),
            TextField::new('reference'),
            AssociationField::new('modele'),
            AssociationField::new('emplacement'),
            AssociationField::new('peripheriques'),
            AssociationField::new('utilisateurs'),
            AssociationField::new('systeme'),
        ];
    }
    
}
