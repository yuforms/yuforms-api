<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends AbstractController
{
    /**
     * @Route("/api/v1/authentication", methods={"POST"})
     */
    public function create(): Response
    {
        // here is to set all type of the authenticating operations
        // verify email, change 2fa, reset password
        return $this->json([
            'message' => 'here is going to be authentication-create endpoint'
        ]);
    }
}
