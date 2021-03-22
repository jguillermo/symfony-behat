<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HealthCheckController
{
    /**
     * @Route("/health-check", methods={"GET"})
     */
    public function index()
    {
        return new JsonResponse([
            'status'=>'ok'
        ]);
    }

}