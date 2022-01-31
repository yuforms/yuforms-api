<?php

namespace App\Request;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePasswordRequest extends BaseRequest
{
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
    protected $password;

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
