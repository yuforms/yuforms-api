<?php

namespace App\Controller;

use App\Request\SignUpRequest;
use App\Request\SignInRequest;
use App\Request\SignIn2FARequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    /**
     * @Route("/api/v1/sign-up", name="sign-up", methods={"POST"})
     */
    public function signUp(SignUpRequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be sign-up endpoint',
            'content' => $request->getContentAsArray(),
        ]);
    }

    /**
     * @Route("/api/v1/sign-in", name="sign-in", methods={"POST"})
     */
    public function signIn(SignInRequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be sign-in endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }

    /**
     * @Route("/api/v1/sign-in-2FA", name="sign-in-2FA", methods={"POST"})
     */
    public function signIn2FA(SignIn2FARequest $request): Response
    {
        return $this->json([
            'message' => 'here is going to be sign-in-2FA endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }

    /**
     * @Route("/api/v1/sign-out", name="sign-out", methods={"POST"})
     */
    public function signOut(): Response
    {
        return $this->json([
            'message' => 'here is going to be sign-out endpoint'
        ]);
    }

    /**
     * @Route("/api/v1/me", name="me", methods="GET")
     */
    public function me(): Response
    {
        return $this->json([
            'message' => 'here is going to be \'me\' endpoint'
        ]);
    }

}
