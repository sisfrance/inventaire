<?php

namespace App\Controller\Admin;

use App\Entity\Telephone;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class TelephoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Telephone::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('reference'),
            TextField::new('numero'),
            AssociationField::new('emplacement'),
            AssociationField::new('modele'),
        ];
    }
 }
