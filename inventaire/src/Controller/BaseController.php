<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use App\Repository\ClientRepository;
use App\Repository\SiteRepository;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
class BaseController extends AbstractController
{
    
    private function render_clients(): ?Array
    {
		$clientsRepository=$this->getDoctrine()->getManager()->getRepository('App\Entity\Client');
		$clients=$clientsRepository->findAll();
		return $clients;
		
	}
    /**
     * @Route("/base", name="base")
     */
    public function index(): Response
    {
        /*$marquesRepository=$this->getDoctrine()
					->getManager()
					->getRepository('App\Entity\Marque');
		$marques=$marquesRepository->findAllMarque();
		$modelesRepository=$this->getDoctrine()
							->getManager()
							->getRepository('App\Entity\Modele');
		$modeles=$modelesRepository->findAll();*/
		
		
        return $this->render('base/index.html.twig', [
        'partial'=>'base/default.html.twig',
        'clients'=>$this->render_clients()
        /*'marques'=>$marques,
        'modeles'=>$modeles*/
        
        ]);
    }
    /**
     * @Route("/client/{id}", name="client")
     */
     public function client(int $id): Response
     {
		$clientRepository=$this->getDoctrine()->getManager()->getRepository('App\Entity\Client');
		$client=$clientRepository->find($id);
		return $this->render('base/index.html.twig', [
		'partial'=>'base/listeSites.html.twig',
		'sites'=>$client->getSites(),
		'clients'=>$this->render_clients()
		]);
	}
	/**
	 * @Route("/utilisateur", name="utilisateur")
	 */
	public function utilisateur(): Response
	{
		$utilisateur = new Utilisateur();
		$form = $this->createForm(UtilisateurType::class,$utilisateur);
		return $this->render('base/index.html.twig',[
							'partial'=>'base/form.html.twig',
							'form_utilisateur'=>$form->createView(),
							'clients'=>$this->render_clients()
							]);
		
	} 
}
