<?php

namespace App\Request;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class SignIn2FARequest extends BaseRequest
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
     *     min = 5,
     *     max = 5
     * )
     */
    protected $authentication_code;

}
