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
use App\Entity\Utilisateur;
use App\Entity\Client;
use App\Entity\Session;
use App\Entity\Vpn;

use App\Form\OrdinateurType;
use App\Form\UtilisateurType;

use App\Share\SharedFunctionsObject;
use App\Share\Pagination;

class BaseController extends AbstractController
{
    public function __construct(SessionInterface $session)
    {
		$this->session=$session;
		
		
	}
	/**
	 * FONCTION GetObjet
	 * role: Permet à partir d'un objet rentré dans l'url de définir l'entité qui sera concerné ainsi
	 * que le modèle du formulaire à adopter
	 * params: $objet <string>
	 * return: <array> Entite <Entity>, FormType <FormType>
	 */

	private function getObjet($objet): Array
	{
		switch($objet)
		{
			case 'ordinateur':
				return array("instance"=>new Ordinateur(),
							 "entity"  =>Ordinateur::class,
							 "formtype"=>OrdinateurType::class
							 );
				break;
			case 'utilisateur':
			    return array("instance"=>new Utilisateur(),
							 "entity"  =>Utilisateur::class,
							 "formtype"=>UtilisateurType::class
							 );
				break;
			case 'vpn':
				return array("instance"=>new Vpn(),
							 "entity"  =>Vpn::class,
							 );
				break;
			case 'session':
			    return array("instance"=>new Session(),
							"entity"   =>Session::class,
							);
				break;			
			default:
			    return false;
		}
	}
	
    /**
     * @Route("/base", name="base")
     */
    public function index(Request $request): Response
    {
        $share=new SharedFunctionsObject($this->getDoctrine()->getManager(),'ordinateur');
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

        $liste=$share->filter($this->session->get('client'),$terms);
        
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
		
		$share=new SharedFunctionsObject($this->getDoctrine()->getManager(),$element);
		
		$liste=$share->filter($this->session->get('client'),[]);
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

        $share=new SharedFunctionsObject($this->getDoctrine()->getManager(),$objet);
        
        $liste=$share->filter($this->session->get('client'),$filter);
        
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
		
		$share=new SharedFunctionsObject($this->getDoctrine()->getManager(),'ordinateur');
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
		$ids_client = $this->session->get('client');
		$objet = $this->session->get('objet');
    
		$share=new SharedFunctionsObject($this->getDoctrine()->getManager(),$objet);
		$terms=$share->create_filter($request,$objet);
		$this->session->set('filter',$terms);
		$this->session->set('context',$share->createContext($this,$ids_client,$terms));
		
		$liste_elements=$share->filter($this->session->get('client'),$terms);
		
		$pageManager=new Pagination($liste_elements,$objet,4,20,1);	
		$pagination=$pageManager->paginate();
		
		return $this->render("base/liste_{$objet}s.html.twig",[
				'elements' => $pagination['content'],
				'pagination_controls'=>$pagination['pagination'],
				'context'  => $this->session->get('context'),
				]);
	}
		
	/**
	 * @Route("/base/details/{objet}/{id}", name="details",requirements={"objet"="\w+","id"="\d+"})
	 */
	 public function details(Request $request, string $objet, int $id): Response
	 {
		 $o=$this->getObjet($objet);
		 $instance=$this->getDoctrine()->getRepository($o['entity'])->findById($id);
		 
		 return $this->render("base/details_{$objet}.html.twig",["{$objet}"=>$instance[0]
																]);
	 }
	 /**
	 * FONCTIONS D'ADMINISTRATION ET DE MANAGE
	 */
	 
	 /** 
	 * @Route("/base/add/{element}", name="add")
	 */
	 public function add(Request $request, string $element): Response
	 {
		$o=$this->getObjet($element);
		$form=$this->createForm($o["formtype"],$o["instance"]);
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
		$o=$this->getObjet($element);
		$instance=$this->getDoctrine()->getRepository($o["entity"])->find($id);
		$form=$this->createForm($o["formtype"],$instance);
		/*$form->objet=$element;*/
		return $this->render("forms/{$element}_form.html.twig",array(
																	'id'=>$id,
																	'form'=>$form->createView(),
																	'context'=>$this->session->get('context'),
								
								));  
	  }
	  /**
	 * @Route("/base/add_item", name="add_item")
	 */
	 public function add_item(Request $request):Response
	 {
		var_dump($request->request);die;
		$response = new Response("coucou");
		$response->send();
		 
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
			print_r($form->isValid());
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
				var_dump($form->getErrorsAsString());die;
				return $this->render("forms/{$element}_form.html.twig",array(
																	'id'=>$id,
																	'form'=>$form->createView(),
																	'context'=>$this->session->get('context'),
								
																	));  
			}
		 }
		 
	  }
	  /**
	  * @Route("/base/showpw", name="showpw")
	  */
	  public function showpw(Request $request):Response
	  {
		  $id=$request->request->get('id');
		  $objet=$request->request->get('objet');
		  $o=$this->getObjet($objet);
		  
		  $instance = $this->getDoctrine()->getRepository($o['entity'])->find($id);
		  
		  $response = new Response($instance->getMdp());
		  $response->send();
	  }
	  /**
	   * @Route("/base/hide", name="hidepw")
	   */
	  public function hidepw(Request $request):Response
	  {
		  $id=$request->request->get('id');
		  $objet=$request->request->get('objet');
		  $o=$this->getObjet($objet);
		  
		  $instance = $this->getDoctrine()->getRepository($o['entity'])->find($id);
		  
		  $response = new Response($instance->getHashMdp());
		  $response->send();
		  
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
