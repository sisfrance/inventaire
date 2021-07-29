<?php
namespace App\Share;

use Doctrine\ORM\EntityManager;
use App\Entity\Client;
use App\Entity\Ordinateur;
use App\Entity\Utilisateur;
use App\Entity\OrdinateurView;
use App\Entity\UtilisateurView;
use App\Entity\Emplacement;
use App\Entity\Site;

use Doctrine\Common\Collections\ArrayCollection;

class SharedFunctionsObject
{
	const TERMS = array(
						'ordinateur'=>array(
									'serialnumber'=>array('table'=>'o',
															'field'=>'serial_number',
															'value'=>NULL,
															),
									 'utilisateurs'=>array('table'=>'o',
															'field'=>'utilisateur',
															'value'=>NULL,
															  ),
									'sites'=>       array('table'=>'o',
														'field'=>'site',
														'value'=>NULL,
														)
						),
						'utilisateur'=>array(
										'nom'=>array('table'=>'o',
													'field'=>'nom',
													'value'=>NULL,
													),
										'prenom'=>array('table'=>'o',
														'field'=>'prenom',
														'value'=>NULL,
														),
										'sites'=>array('table'=>'o',
													'field'=>'site',
													'value'=>NULL,
													)
						)
				  );
	public function __construct(EntityManager $em,string $objet)
	{
		$this->em=$em;
		$this->objet=$objet;
	}
	
	
	public function createContext($objet,$idsclients=[1],$filter):Array
	{
		$clients=$this->em->getRepository(Client::class)->findAll();
		
		
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
		$terms=$this::TERMS[$this->objet];
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
		
		$query->add('where',$query->expr()->in("o.emplacement",":empl"));

		if(count($terms)>0){
			foreach($terms as $term=>$value)
			{
					$query=$query->andWhere($query->expr()->in("{$value['table']}.{$value['field']}",":term{$i}"));
					/*$query=$query->orWhere("{$value['table']}.{$value['field']} = ':term{$i}'");*/
					$i+=1;
			}
			/*var_dump($query->getDQL());*/
		}
		return $query;
		
	}
	
	/***
	 * Fonction de filtrage des données
	 */
	
	public function filter($ids_clients=[1], $terms):ArrayCollection
	{
		/* Creation des criteres */
		switch ($this->objet)
		{
		    case 'ordinateur':
		    case 'peripherique':
		        $class_search=OrdinateurView::class;
		        $class_request=Ordinateur::class;
				/* Verifie si on a des resultats sur la requete et construit le tableau de criteres */
				break;
			case 'utilisateur':
				$class_search=UtilisateurView::class;
				$class_request=Utilisateur::class;
				break;
		   default:
			    return false;
		     		
		}
		
		
		
		/* Creation du querybuild */
		
		$result=array();
		
		$repo = $this->em->getRepository($class_search);
		$query=$repo->createQueryBuilder('o');
		$query=$this->createCriterias($query,$terms);
		
		if(isset($terms) && count($terms)>0)
		{
			$i=0;
			foreach($terms as $term=>$value)
			{
				if($value['value'])
					{
						$query->setParameter("term{$i}",$value['value']);
					}
					$i+=1;
			}
		}
		$emplacements=$this->em->getRepository(Emplacement::class)->getEmplacementFromClients($ids_clients);
		
		$query->setParameter("empl",$emplacements);
		
		$fullQuery=$query->getQuery();
		$result=$fullQuery->getResult();

		$fetch_id_function = function($elt){ return $elt->getId();};
		
		$ids=array_map($fetch_id_function,$result);

	    $result=new ArrayCollection($this->em->getRepository($class_request)->findBy(array('id'=>$ids)));
		return $result;
		
	}
}

?>
