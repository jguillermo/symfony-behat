<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthCheckController
{
    /**
     * @Route("/health-check-json", methods={"GET"})
     */
    public function healthCheckJson()
    {
        return new JsonResponse([
            'status' => 'ok'
        ]);
    }

    /**
     * @Route("/health-check-html", methods={"GET"})
     */
    public function healthCheckHtml()
    {
        return new Response("ok");
    }

    /**
     * @Route("/ok", methods={"GET"})
     */
    public function ok()
    {
        return new Response("");
    }

    /**
     * @Route("/register-error", methods={"POST"})
     */
    public function registerError()
    {
        return new JsonResponse([
            'status' => 'error',
            'message' => 'lastName: This value should not be blank.'
        ],400);
    }

    /**
     * @Route("/register-ok", methods={"POST"})
     */
    public function registerOk()
    {
        return new JsonResponse([
            'status' => 'ok',
            'id' => '987654321',
            'name' => 'jhon',
            'token' => 'ksdjjdb',
        ],201);
    }

}