<?php

namespace App\Controller\Admin;

use App\Entity\Vpn;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VpnCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vpn::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
