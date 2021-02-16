<?php

namespace App\Controller\Admin;

use App\Entity\Ordinateur;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class OrdinateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ordinateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('reference'),
            TextField::new('serialnumber'),
            AssociationField::new('type'),
            AssociationField::new('processeur'),
            TextField::new('ram'),
            TextField::new('date_achat'),
            AssociationField::new('fournisseur'),
            TextField::new('ipadresse'),
            AssociationField::new('os'),
            AssociationField::new('emplacement'),
            AssociationField::new('peripheriques'),
            AssociationField::new('modele'),
            TextEditorField::new('notes'),
        ];
    }
    
}
