<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShareController extends AbstractController
{
    /**
     * @Route("/api/v1/share", name="share-create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be share-create endpoint',
        ]);
    }

    /**
     * @Route("/api/v1/share/{id}", name="share-read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id): Response
    {
        return $this->json([
            'message' => 'here is going to be share-read endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/share/{id}", name="share-update", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function update($id): Response
    {
        return $this->json([
            'message' => 'here is going to be share-update endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/share/{id}", name="share-delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete($id): Response
    {
        return $this->json([
            'message' => 'here is going to be share-delete endpoint',
            'id' => $id
        ]);
    }
}
