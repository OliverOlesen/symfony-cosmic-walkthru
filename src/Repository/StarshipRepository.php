<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use Psr\Log\LoggerInterface;

readonly class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Starships collection retrieved');

        return [
            new Starship(
                1,
                'Uss LeafyCruiser',
                'Garden',
                'Jean-Paul',
                StarshipStatusEnum::IN_PROGRESS
            ),
            new Starship(
                2,
                'Dk BarnTra',
                'Behemoth',
                'Bob-Karl',
                StarshipStatusEnum::COMPLETED
            ),
            new Starship(
                3,
                'De DerBerliner',
                'Average',
                'Hilbert-Kaiser',
                StarshipStatusEnum::WAITING
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship)
        {
            if ($starship->getId() === $id)
            {
                return $starship;
            }
        }

        return null;
    }
}