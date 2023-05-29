<?php

namespace App\Controller;
use App\Entity\Countries;
use App\Entity\Continents;
use App\Repository\ContinentsRepository;
use App\Repository\CountriesRepository;
use App\Form\CountriesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(CountriesRepository $countries, ContinentsRepository $continents): Response
    {
        return $this->render('main/home.html.twig', [
            'countries' => $countries->findAll(),
            'continents' => $continents->findAll(),
        ]);
    }
    #[Route('/tab/{id}', name: 'tab', methods: ['GET'])]
    public function tab(Continents $continent, CountriesRepository $repoCountries, ContinentsRepository $repoContinents): Response
    {
        $continents = $repoContinents->findAll();
        return $this->render('main/tab.html.twig', [
            'cont' => $continents,
            'countries' => $repoContinents->findAll(),
            'continent' => $continent,
        ]);
    }
}
