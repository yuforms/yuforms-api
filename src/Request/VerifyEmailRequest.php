<?php

namespace App\Request;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class VerifyEmailRequest extends BaseRequest
{
    /**
     * @Assert\NotBlank
     * @Assert\Email
     * @Assert\Length(
     *     max = 320
     * )
     */
    protected $email;


    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = 6,
     *     max = 6
     * )
     */
    protected $authentication_code;
}
