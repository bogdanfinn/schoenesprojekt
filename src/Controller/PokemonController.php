<?php

namespace App\Controller;

use App\Services\PokemonService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends Controller
{
    /**
     * @Route(path="/", name="pokemon_index")
     */
    public function indexAction(PokemonService $pokemonService): Response
    {
        $pokemons = $pokemonService->getAll();

        return $this->render('pages/index.html.twig', ['pokemons' => $pokemons]);
    }

    /**
     * @Route(path="/pokemon/{id}", name="pokemon_details")
     */
    public function detailsAction(int $id, PokemonService $pokemonService): Response
    {
        $pokemon = $pokemonService->getPokemonById($id);

        return $this->render('pages/details.html.twig', ['pokemon' => $pokemon]);
    }
}