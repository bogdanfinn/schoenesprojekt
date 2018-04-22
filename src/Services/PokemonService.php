<?php

namespace App\Services;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;

class PokemonService
{
    const API_BASE_URL = 'http://pokeapi.co/api/v2/pokemon/{id}';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAll(): array
    {
        return $this->entityManager->getRepository(Pokemon::class)->findAll();
    }

    public function getPokemonById(int $id): ?Pokemon
    {
        $pokemon = $this->entityManager->getRepository(Pokemon::class)->find($id);

        if($pokemon !== null){
            return $pokemon;
        }

        try {
            $apiResponse = $this->callPokemonApi($id);

            return $this->transformApiResponse($apiResponse);
        } catch(\Exception $e){
            return null;
        }
    }

    private function callPokemonApi(int $id): array
    {
        $url = str_replace('{id}', $id, self::API_BASE_URL);

        return json_decode(file_get_contents($url), true);
    }

    private function transformApiResponse(array $apiResponse): Pokemon
    {
        $pokemon = new Pokemon();
        $pokemon->setId($apiResponse['id']);
        $pokemon->setName($apiResponse['name']);
        $pokemon->setHeight($apiResponse['height']);
        $pokemon->setWeight($apiResponse['weight']);
        $pokemon->setImage($apiResponse['sprites']['front_default']);

        $this->entityManager->persist($pokemon);
        $this->entityManager->flush();

        return $pokemon;
    }
}