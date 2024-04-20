<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {
        $starships = $repository->findAll();

        return $this->json($starships);
    }

    #[Route('/', methods: ['POST'])]
    public function create() {

    }

    // In this case on the Route, <> after id is REGEX and in this case only allows id to be of any digit length.
    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository): Response {
        $starship = $repository->find($id);

        if (!$starship)
        {
            throw $this->createNotFoundException("Starship id: $id not found");
        }

        return $this->json($starship);
    }
}