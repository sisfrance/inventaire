<?php
namespace App\Share;

use Doctrine\ORM\EntityManager;
use App\Entity\Client;
use App\Entity\Ordinateur;
use App\Entity\OrdinateurView;
use App\Entity\Emplacement;

use Doctrine\Common\Collections\ArrayCollection;

class SharedFunctionsObject
{
	const TERMS = array(
					'serialnumber'=>array('table'=>'o',
											'field'=>'serial_number',
											'value'=>NULL,
											),
					 'utilisateurs'=>array('table'=>'o',
											'field'=>'utilisateur_id',
											'value'=>NULL,
											  ),
					'sites'=>       array('table'=>'o',
										'field'=>'site_id',
										'value'=>NULL,
										)
								);
	public function __construct(EntityManager $em)
	{
		$this->em=$em;
	}
	public function createContext($objet,$idsclients=[1],$filter):Array
	{
		$clients=$this->em->getRepository(Client::class)->findAll();
		/*>order_by('client ASC');*/
		/*$categories=$objet->getDoctrine()->getRepository(Categorie::class)->findAll();*/
		
		return ['clients'=>$clients,
		        'idsclients'=>$idsclients,
				'filtres'=>$filter,
				'utilisateurs'=>$this->em->getRepository(Client::class)->getUtilisateurs($idsclients),
				'sites'=>$this->em->getRepository(Client::class)->getSites($idsclients),
			 ];
	}
	/***
	 * Retourne un tableau de valeurs que l'on peut stocker en session pour garder les filtres en cours en mémoire
	 ***/
	public function create_filter($request):Array
	{
		$terms=$this::TERMS;
		
		foreach($terms as $term=>$value)
		{
			if($request->request->get($term))
			{
				$terms[$term]['value']=$request->request->get($term);
			}
			else
			{
				unset($terms[$term]);
			}
		}
		
		return $terms;
	}
	/***
	 * Transforme le tableau de termes de filtres en tableau de criteres 
	 * */
	 
	private function createCriterias($query,Array $terms)
	{
		$criterias=array();
		$i=0;
		foreach($terms as $term=>$value)
			{
				$query=$query->andWhere($query->expr()->in("{$value['table']}.{$value['field']}",":term{$i}"));
				/*$query=$query->orWhere("{$value['table']}.{$value['field']} = ':term{$i}'");*/
				$i+=1;
			}
		return $query;
		
	}
	
	/***
	 * Fonction de filtrage des données
	 */
	 
	public function filter($objet, $terms):ArrayCollection
	{
		/* Creation des criteres */
		switch ($objet)
		{
		    case 'ordinateur':
		    case 'peripherique':
		        $class=OrdinateurView::class;
				/* Verifie si on a des resultats sur la requete et construit le tableau de criteres */
				
				
				break;
		   default:
			    $terms=array();
		     		
		}
		
		
		
		/* Creation du querybuild */
		
		$result=array();
		
		$repo = $this->em->getRepository($class);
		$query=$repo->createQueryBuilder('o');

		$query=$this->createCriterias($query,$terms);
		$i=0;
		foreach($terms as $term=>$value)
		{
			if($value['value'])
				{
					$query->setParameter("term{$i}",$value['value']);
				}
				$i+=1;
		}
		$fullQuery=$query->getQuery();
		$elements=$fullQuery->getResult();

		$fetch_id_function = function($elt){ return $elt->getId();};
		
		$ids=array_map($fetch_id_function,$elements);

	    $result=new ArrayCollection($this->em->getRepository(Ordinateur::class)->findBy(array('id'=>$ids)));
		return $result;
		
	}
}

?>
