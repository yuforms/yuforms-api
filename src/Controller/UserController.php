<?php

namespace App\Controller;

use App\Request\ChangeEmailRequest;
use App\Request\VerifyEmailRequest;
use App\Request\ResetPasswordRequest;
use App\Request\ChangePasswordRequest;
use App\Request\Change2FARequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/api/v1/change-email", name="change-email", methods={"POST"})
     */
    public function changeEmail(ChangeEmailRequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be change-my-email endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }

    /**
     * @Route("/api/v1/verify-email", name="verify-email", methods={"POST"})
     */
    public function verifyEmail(VerifyEmailRequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be verify-email endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }

    /**
     * @Route("/api/v1/reset-password", name="reset-password", methods={"POST"})
     */
    public function resetPassword(ResetPasswordRequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be reset-password endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }

    /**
     * @Route("/api/v1/change-password", name="change-password", methods={"POST"})
     */
    public function changePassword(ChangePasswordRequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be change-password endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }

    /**
     * @Route("/api/v1/change-2FA", name="change2FA", methods={"POST"})
     */
    public function change2FA(Change2FARequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be change2FA endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }


}
