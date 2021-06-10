<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManager;
use App\Entity\Ordinateur;
use App\Entity\Client;

use App\Share\SharedFunctionsObject;
use App\Share\Pagination;

class BaseController extends AbstractController
{
    public function __construct(SessionInterface $session)
    {
		$this->session=$session;
		
		
	}
	protected function getElements($objet)
	{
		switch($objet)
        { 
			case 'ordinateur':
			case 'peripherique':
				$getter='get'.ucfirst($objet).'s';
				$liste=$this->getDoctrine()->getRepository(Client::class)->{$getter}($id_client);
				break;
			default:
				return false;
	    }
	    return $liste;
	}
    /**
     * @Route("/base", name="base")
     */
    public function index(Request $request): Response
    {
        $share=new SharedFunctionsObject($this->getDoctrine()->getManager());
        /* reinitialisation des sessions */
        
        $this->session->set('client',array(1));
		$this->session->set('objet','ordinateur');
		$this->session->set('filter',array());
		
        $id_client = $this->session->get('client');
        $objet     = $this->session->get('objet');
        $filter    = $this->session->get('filter');
        
        $this->session->set('context',$share->createContext($this,$id_client,$filter)); 
        $terms=$share->create_filter($request);
        $liste=$share->filter($objet,$terms);
        
        $pageManager=new Pagination($liste,$objet,4,20,1);
        
        $pagination=$pageManager->paginate();
        
        return $this->render('base/index.html.twig', [
            'elements' => $pagination['content'],
            'pagination_controls'=>$pagination['pagination'],
            'context'  => $this->session->get('context'),
            'target' => 'base/liste_ordinateurs.html.twig',
        ]);
    }
    
    public function page(Request $request,string $element,int $page):Response
    {
		/*$liste=$this->getDoctrine()->getRepository(Client::class)->getOrdinateurs($this->session->get('client'));*/
		
		$objet     = $this->session->get('objet');
        $filter    = $this->session->get('filter');

        $share=new SharedFunctionsObject($this->getDoctrine()->getManager());
        
        $liste=$share->filter($objet,$filter);
        
		$pageManager= new Pagination($liste,$element,4,20,$page);
		$pagination=$pageManager->paginate();
		return $this->render('base/liste_ordinateurs.html.twig', [
			'elements' => $pagination['content'],
            'pagination_controls'=>$pagination['pagination'],
            'context'  => $this->session->get('context'),
            ]);
		
	}
	
    public function client_change(Request $request):Response
    {
		$clients=$request->request->get('clients');

		$this->session->set('client',$clients);
		$this->session->set('filter',[]);
		$this->session->set('objet','ordinateur');
		
		$liste=$this->getDoctrine()->getRepository(Client::class)->getOrdinateurs($clients);
		
		$share=new SharedFunctionsObject($this->getDoctrine()->getManager());
		$this->session->set('context',$share->createContext($this,$clients,[]));
		
		  
		$pageManager=new Pagination($liste,$this->session->get('objet'),4,20,1);
		$pagination=$pageManager->paginate();
		
		return $this->render('base/liste_ordinateurs.html.twig',[
			'elements' => $pagination['content'],
            'pagination_controls'=>$pagination['pagination'],
            'context'  => $this->session->get('context'),
            ]);
	}
	
	/**
     * @Route("/base/filter/update", name="search")
     */
    public function filter(Request $request): Response
    {
		$share=new SharedFunctionsObject($this->getDoctrine()->getManager());
		$terms=$share->create_filter($request);
		
		$ids_client = $this->session->get('client');
		$objet = $this->session->get('objet');
		
		$this->session->set('filter',$terms);
		$this->session->set('context',$share->createContext($this,$ids_client,$terms));
		
		$liste_elements=$share->filter($objet,$terms);
		
		$pageManager=new Pagination($liste_elements,$objet,4,20,1);	
		$pagination=$pageManager->paginate();
		
		return $this->render('base/liste_ordinateurs.html.twig',[
				'elements' => $pagination['content'],
				'pagination_controls'=>$pagination['pagination'],
				'context'  => $this->session->get('context'),
				]);
		}
		 
}
