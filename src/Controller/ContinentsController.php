<?php

namespace App\Controller;

use App\Entity\Continents;
use App\Form\ContinentsType;
use App\Repository\ContinentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContinentsController extends AbstractController
{
    #[Route('/continents', name: 'continents_index')]
    #[Route('/continents/{id}/edit', name:'continents_edit')]
      
    public function index(?Continents $continents, Request $request, EntityManagerInterface $entityManager): Response
    {

        if(!$continents){
            $continents = new Continents();
        }

        $form = $this->createForm(ContinentsType::class, $continents);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            if(!$continents->getId()){
                $entityManager->persist($continents);
            }
            $entityManager->flush();
            
            //$this->addFlash('success', 'Votre ajout a été pris en compte');
            return $this->redirect($this->generateUrl('continents_edit', ['id' => $continents->getId()]));
        }

        return $this->render('continents/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/continents/list', name: 'continents_list')]
    public function list_continents(ContinentsRepository $continents): Response
    {
        //$repository = $this->getDoctrine()->getRepository(Continents::class);
        //$list_continents = $liste -> getRepository(Continents::class) -> findall();
        return $this->render('/continents/list.html.twig', [
            //'$list_continents' => $list_continents
            'list' => $continents-> findall(),
        ]);
    }

    #[Route('/continents/delete/{id}', name:'continents_delete')]

    public function deleteContinent(Continent $continent) {
        $Manager = $this->getDoctrine()->getManager();
        $Manager->remove($continent);
        $Manager->flush();

        //$this->addFlash('success', 'Votre suppression a été pris en compte');

        return $this->redirectToRoute('continent_edit');
    }
}
