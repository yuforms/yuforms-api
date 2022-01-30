<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController
{
    /**
     * @Route("/api/v1/template", name="template-create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be template-create endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/template/{id}", name="template-read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id): Response
    {
        return $this->json([
            'message' => 'here is going to be template-read endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/template/{id}", name="template-update", methods={"PUT"}, requirements={"id"="\d+"})
     */
    public function update($id): Response
    {
        return $this->json([
            'message' => 'here is going to be template-update endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/template/{id}", name="template-delete", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function delete($id): Response
    {
        return $this->json([
            'message' => 'here is going to be template-delete endpoint',
            'id' => $id
        ]);
    }

    /**
     * @Route("/api/v1/template/{id}", name="template-change-public", methods={"PATCH"}, requirements={"id"="\d+"})
     */
    public function changePublic($id): Response
    {
        return $this->json([
            'message' => 'here is going to be template-change-public endpoint',
            'id' => $id
        ]);
    }
}
