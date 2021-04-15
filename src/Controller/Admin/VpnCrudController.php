<?php

namespace App\Controller\Admin;

use App\Entity\Vpn;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class VpnCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vpn::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            AssociationField::new('utilisateur'),
            TextField::new('identifiant'),
            TextField::new('mdp'),
        ];
    }
}
