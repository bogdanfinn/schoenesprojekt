<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Services\PokemonService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends Controller
{
    /**
     * @Route(path="/", name="pokemon_index")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function indexAction(EntityManagerInterface $entityManager): Response
    {
        $pokemons = $entityManager->getRepository(Pokemon::class)->findAll();

        return $this->render('pages/index.html.twig', ['pokemons' => $pokemons]);
    }

    /**
     * @Route(path="/pokemon/{id}", name="pokemon_details")
     * @param int $id
     * @param PokemonService $pokemonService
     * @return Response
     */
    public function detailsAction(int $id, PokemonService $pokemonService): Response
    {
        $pokemon = $pokemonService->getPokemonById($id);

        return $this->render('pages/details.html.twig', ['pokemon' => $pokemon]);
    }

}