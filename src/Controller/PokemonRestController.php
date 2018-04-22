<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Services\PokemonService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PokemonRestController extends Controller
{
    /**
     * @Route(path="/api/pokemon", name="pokemon_api")
     */
    public function getAllPokemons(EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
    {
        $pokemons = $entityManager->getRepository(Pokemon::class)->findAll();
        $serializedObjects = $serializer->serialize($pokemons, 'json');

        return new Response($serializedObjects);
    }

    /**
     * @Route(path="/api/pokemon/{id}", name="pokemon_api")
     */
    public function getPokemon(int $id, PokemonService $pokemonService, SerializerInterface $serializer): Response
    {
        $pokemon = $pokemon = $pokemonService->getPokemonById($id);
        $serializedObjects = $serializer->serialize($pokemon, 'json');

        return new Response($serializedObjects);
    }
}