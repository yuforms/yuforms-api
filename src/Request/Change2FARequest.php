<?php

namespace App\Request;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

class Change2FARequest extends BaseRequest
{
    /**
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @Assert\Length(
     *     min = 6,
     *     max = 6
     * )
     */
    protected $authentication_code;

    /**
     * @Assert\NotBlank
     * @Assert\Type("bool")
     */
    protected $open;
}
