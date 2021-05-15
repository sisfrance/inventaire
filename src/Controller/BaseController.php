<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Ordinateur;
use App\Entity\Client;

use App\Share\SharedFunctionsObject;
use App\Share\Pagination;

class BaseController extends AbstractController
{
    public function __construct(SessionInterface $session)
    {
		$this->session=$session;
		$this->session->set('client',1);
		
	}
    /**
     * @Route("/base", name="base")
     */
    public function index(): Response
    {
        $share=new SharedFunctionsObject();
        $this->session->set('context',$share->createContext($this));
        $id_client=$this->session->get('client');
        $liste=$this->getDoctrine()->getRepository(Client::class)->getOrdinateurs($id_client);
        $pageManager=new Pagination($liste,"ordinateur",4,20,1);
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
		$liste=$this->getDoctrine()->getRepository(Client::class)->getOrdinateurs($this->session->get('client'));
		$pageManager= new Pagination($liste,$element,4,20,$page);
		$pagination=$pageManager->paginate();
		return $this->render('base/liste_ordinateurs.html.twig', [
			'elements' => $pagination['content'],
            'pagination_controls'=>$pagination['pagination'],
            ]);
		
	}
    public function change_client():Response
    {
		
	}
}
