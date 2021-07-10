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

use App\Form\OrdinateurType;

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
		
		if($this->session->get('flash'))
		{
			$flash = $this->session->get('flash');
		}
		else
		{
		     $flash=$this->session->set('flash','');
	    }
	    
        $id_client = $this->session->get('client');
        $objet     = $this->session->get('objet');
        $filter    = $this->session->get('filter');
        
        $this->session->set('context',$share->createContext($this,$id_client,$filter)); 
        $terms=$share->create_filter($request);
        $liste=$share->filter($objet,$this->session->get('client'),$terms);
        
        $pageManager=new Pagination($liste,$objet,4,20,1);
        
        $pagination=$pageManager->paginate();
        
        return $this->render('base/index.html.twig', [
            'elements' => $pagination['content'],
            'pagination_controls'=>$pagination['pagination'],
            'context'  => $this->session->get('context'),
            'target' => 'base/liste_ordinateurs.html.twig',
        ]);
    }
    public function liste(Request $request,string $element):Response
    {
		$this->session->set('objet',$element);
		$this->session->set('filter',[]);
		
		$share=new SharedFunctionsObject($this->getDoctrine()->getManager());
		
		$liste=$share->filter($element,$this->session->get('client'),[]);
		$pageManager = new Pagination($liste,$element,4,20,1);
		$pagination=$pageManager->paginate();
		
		return $this->render('base/index.html.twig',[
								'elements'=>$pagination['content'],
								'pagination_controls'=>$pagination['pagination'],
								'context'  => $this->session->get('context'),
								'target' => "base/liste_{$element}s.html.twig",
								]
								);
		
		
	}
    public function page(Request $request,string $element,int $page):Response
    {
		/*$liste=$this->getDoctrine()->getRepository(Client::class)->getOrdinateurs($this->session->get('client'));*/
		
		$objet     = $this->session->get('objet');
        $filter    = $this->session->get('filter');

        $share=new SharedFunctionsObject($this->getDoctrine()->getManager());
        
        $liste=$share->filter($objet,$this->session->get('client'),$filter);
        
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
	/*
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
		
		$liste_elements=$share->filter($objet,$this->session->get('client'),$terms);
		
		$pageManager=new Pagination($liste_elements,$objet,4,20,1);	
		$pagination=$pageManager->paginate();
		
		return $this->render('base/liste_ordinateurs.html.twig',[
				'elements' => $pagination['content'],
				'pagination_controls'=>$pagination['pagination'],
				'context'  => $this->session->get('context'),
				]);
	}
		
	/**
	 * @Route("/base/details/{element}/{id}", name="details")
	 */
	 public function details(Request $request, string $element, integer $id): Response
	 {
		 return new Response("details");
	 }
	 /**
	 * FONCTIONS D'ADMINISTRATION ET DE MANAGE
	 */
	 /** 
	 * @Route("/base/add/{element}", name="add")
	 */
	 public function add(Request $request, string $element): Response
	 {
		$ordinateur = new Ordinateur();
		$form=$this->createForm(OrdinateurType::class,$ordinateur);
		return $this->render("forms/{$element}_form.html.twig",array(
																		'form'=>$form->createView(),
																		'context'  => $this->session->get('context'),
		
								)); 
	 }
	 
	 /**
	  * @Route("/base/edit/{element}/{id}", name="edit")
	  */
	  public function edit(Request $request, string $element, int $id): Response
	  {
		$ordinateur=$this->getDoctrine()->getRepository(Ordinateur::class)->find($id);
		$form=$this->createForm(OrdinateurType::class,$ordinateur);
		return $this->render("forms/{$element}_form.html.twig",array(
																	'id'=>$id,
																	'form'=>$form->createView(),
																	'context'=>$this->session->get('context'),
								
								));  
	  }
	  /**
	  * @Route("/base/save", name="save")
	  */
	  public function save(Request $request): Response
	  {
		$id=$request->request->get('ordinateur')['id'];
		$element=$request->request->get('element');
		
		if($id == 0)
		{
			$instance = new Ordinateur();
		}
		else
		{
			$instance = $this->getDoctrine()->getRepository(Ordinateur::class)->find($id);
		}
		
		$form=$this->createForm(OrdinateurType::class,$instance);
		
		if($request->isMethod('POST'))
		{
			$form->handleRequest($request);
			if($form->isSubmitted() && $form->isValid())
			{
				$instance=$form->getData();
				$em=$this->getDoctrine()->getManager();
				$em->persist($instance);
				$em->flush();
				
				return $this->redirectToRoute('base',[]);
			}
			else
			{
				return $this->render("forms/{$element}_form.html.twig",array(
																	'id'=>$id,
																	'form'=>$form->createView(),
																	'context'=>$this->session->get('context'),
								
																	));  
			}
		 }
		 
	  }
	  
	 /**
	 * @Route("/base/confirm/{element}/{id}",name="confirm",requirements={"element"="\w+","id"="\d+"})
	 */
	 public function confirm(Request $request,string $element,int $id): Response
	 {
		  return $this->render('forms/confirm.html.twig',["element"=>$element,
														"id"=>$id]);
	 }
	  /**
	  * @Route("/base/del/",name="delete")
	  */
	  public function del(Request $request): Response
	  {
		 int: $id=$request->request->get('id');
      }
}
