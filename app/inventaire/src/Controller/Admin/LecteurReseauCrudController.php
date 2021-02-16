<?php

namespace App\Controller\Admin;

use App\Entity\LecteurReseau;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class LecteurReseauCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LecteurReseau::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('adresse_ip'),
            TextField::new('nom_hote'),
            TextField::new('nom_partage'),
            AssociationField::new('ordinateur'),
            AssociationField::new('session'), 
        ];
    }

}
