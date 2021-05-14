<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Ordinateur;
use App\Entity\Client;

use App\Share\SharedFunctionsObject;

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
        return $this->render('base/liste_ordinateurs.html.twig', [
            'elements' => $liste,
            'context'  => $this->session->get('context'),
        ]);
    }
    public function change_client():Response
    {
		
	}
}
