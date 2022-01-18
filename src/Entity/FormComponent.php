<?php

namespace App\Entity;

use App\Repository\FormComponentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormComponentRepository::class)
 */
class FormComponent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $formComponentName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasOptions;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasMultiResponse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFormComponentName(): ?string
    {
        return $this->formComponentName;
    }

    public function setFormComponentName(string $formComponentName): self
    {
        $this->formComponentName = $formComponentName;

        return $this;
    }

    public function getHasOptions(): ?bool
    {
        return $this->hasOptions;
    }

    public function setHasOptions(bool $hasOptions): self
    {
        $this->hasOptions = $hasOptions;

        return $this;
    }

    public function getHasMultiResponse(): ?bool
    {
        return $this->hasMultiResponse;
    }

    public function setHasMultiResponse(bool $hasMultiResponse): self
    {
        $this->hasMultiResponse = $hasMultiResponse;

        return $this;
    }
}
