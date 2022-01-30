<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubmitController extends AbstractController
{
    /**
     * @Route("/api/v1/submit", name="submit-create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be submit-create endpoint',
        ]);
    }

    /**
     * @Route("/api/v1/submit/{id}", name="submit-read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id): Response
    {
        return $this->json([
            'message' => 'here is going to be submit-read endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/submit/{id}", name="submit-update", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function update($id): Response
    {
        return $this->json([
            'message' => 'here is going to be submit-update endpoint',
            'id' => $id
        ]);
    }

}
