<?php

namespace App\Controller\Admin;

use App\Entity\Emplacement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class EmplacementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emplacement::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            TextField::new('emplacement'),
            AssociationField::new('site'),
        ];
    }
    
}
