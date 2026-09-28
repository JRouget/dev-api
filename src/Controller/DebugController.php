<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class DebugController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
    ) {}

    #[Route('/_debug/users', methods: ['GET'])]
    public function users(): JsonResponse
    {
        return $this->json($this->userRepository->findAll());
    }
}
