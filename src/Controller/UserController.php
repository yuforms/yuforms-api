<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/api/v1/change-email", name="change-email", methods={"POST"})
     */
    public function changeMyEmail(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be change-my-email endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/verify-email", name="verify-email", methods={"POST"})
     */
    public function verifyEmail(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be verify-email endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/reset-password", name="reset-password", methods={"POST"})
     */
    public function resetPassword(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be reset-password endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/change-password", name="change-password", methods={"POST"})
     */
    public function changeMyPassword(Request $request): Response
    {
        return $this->json([
            'message' => 'here is going to be change-password endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/change-2FA", name="change2FA", methods={"POST"})
     */
    public function change2FA(): Response
    {
        return $this->json([
            'message' => 'here is going to be change2FA endpoint'
        ]);
    }


}
