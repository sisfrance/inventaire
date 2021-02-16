<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use App\Entity\Fonction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            /*IdField::new('id'),*/
            TextField::new('nom'),
            TextField::new('prenom'),
            AssociationField::new('fonction'),
            AssociationField::new('service'),
            /*TextEditorField::new('description'),*/
        ];
    }
    
}
