<?php

/*
 * I adapted this class for this project from
 * https://hashnode.com/post/validating-requests-in-the-symfony-app-ckuudi17o028ho5s1bjzwacf1
 */

namespace App\Request;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseRequest
{
    private Request $request;
    private ValidatorInterface $validator;
    private ConstraintViolationListInterface $errors;
    private array $messages;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
        $this->request = Request::createFromGlobals();

        $this->populate();
        $this->validate();
    }

    public function validate()
    {
        $this->errors = $this->validator->validate($this);
        $this->messages = [ 'status' => 'error', 'message' => 'validation_failed', 'errors' => []];

        foreach ($this->errors as $message) {
            $this->messages['errors'][] = [
                'property' => $message->getPropertyPath(),
                'value' => $message->getInvalidValue(),
                'message' => $message->getMessage(),
            ];
        }

        if (count($this->messages['errors']) > 0) {
            $this->handler();
            exit;
        }
    }

    protected function populate(): void
    {
        foreach ($this->request->toArray() as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    protected function handler(): void
    {
        (new Response(json_encode($this->messages), 400, ['Content-Type' => 'application/json']))->send();
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getContentAsArray(): array
    {
        return json_decode($this->request->getContent(), true);
    }
}
