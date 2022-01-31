<?php

namespace App\Controller;

use App\Request\Authentication\CreateRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends AbstractController
{
    /**
     * @Route("/api/v1/authentication", methods={"POST"})
     */
    public function create(CreateRequest $request): Response
    {
        /*
         * here is to set all type of the authenticating operations
         * verify email, change 2fa, reset password
         *
         * Type Map:
         *     - verify-email    -> 0
         *     - reset-password  -> 1
         *     - change-2fa      -> 2
         */
        return $this->json([
            'message' => 'here is going to be authentication-create endpoint',
            'content' => $request->getContentAsArray()
        ]);
    }
}
