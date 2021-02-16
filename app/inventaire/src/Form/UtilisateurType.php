<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class UtilisateurType extends AbstractType
{
	
	
		public function buildForm(FormBuilderInterface $builder, array $options): void
		{
				$builder
					->add('nom',TextType::class)
					->add('prenom',TextType::class)
					->add('service')
					->add('postedetravail')
					->add('save',SubmitType::class);
			
		}
}
?>
