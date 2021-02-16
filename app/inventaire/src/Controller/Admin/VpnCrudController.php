<?php

namespace App\Controller\Admin;

use App\Entity\Vpn;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VpnCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vpn::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('compte'),
            TextField::new('mdp'),
            AssociationField::new('utilisateur'),
        ];
    }
}
