<?php
namespace App\Share;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Client;

class SharedFunctionsObject extends AbstractController
{
	public function createContext($objet)
	{
		$clients=$objet->getDoctrine()->getRepository(Client::class)->findAll();
		/*>order_by('client ASC');*/
		/*$categories=$objet->getDoctrine()->getRepository(Categorie::class)->findAll();*/
		
		return ['clients'=>$clients,
				'categories'=>array('cat'=>1),
			 ];
	}
}

?>
