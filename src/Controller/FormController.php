<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/api/v1/form", name="form-create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be form-create endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/form/{id}", name="form-read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id): Response
    {
        return $this->json([
            'message' => 'here is going to be form-read endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/form/{id}", name="form-update", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function update($id): Response
    {
        return $this->json([
            'message' => 'here is going to be form-update endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/form/{id}", name="form-delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete($id): Response
    {
        return $this->json([
            'message' => 'here is going to be form-delete endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/forms", name="form-read-all-as-summary", methods={"GET"})
     */
    public function readAllAsSummary(): Response
    {
        return $this->json([
            'message' => 'here is going to be form-read-all-as-summary endpoint',
        ]);
    }

}
