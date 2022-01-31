<?php

namespace App\Request\Authentication;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class CreateRequest extends BaseRequest
{
    /**
     * @Assert\NotBlank
     * @Assert\Type("int")
     * @Assert\Length(
     *     min = 1,
     *     max = 1
     * )
     */
    protected $type;

    /**
     * @Assert\Blank
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
     *
     * Note: This attribute is to only manage two factor authentication.
     *       So it can be blank for other operation that uses authentication.
    */
    protected $password;
}
