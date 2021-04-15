<?php

namespace App\Controller\Admin;

use App\Entity\Courrier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class CourrierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Courrier::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            #IdField::new('id'),
            AssociationField::new('utilisateur'),
            TextField::new('serveur_entrant'),
            TextField::new('securite'),
            TextField::new('port_sortant'),
            TextField::new('identifiant'),
            
        ];
    }
    
}
