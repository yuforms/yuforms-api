<?php

namespace App\Request;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class ResetPasswordRequest extends BaseRequest
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
     *     min = 10,
     *     max = 10
     * )
     */
    protected $authentication_code;

    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(
     *     max = 50
     * )
     * @Assert\Regex("/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/")
     *
     * must be a min 6 chars
     * must contains at least one number
     * must contains at least one uppercase
     * must contains at least one lowercase
     * must not contains the space char
    */
    protected $new_password;
}

