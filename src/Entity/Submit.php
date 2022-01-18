<?php

namespace App\Entity;

use App\Repository\SubmitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubmitRepository::class)
 */
class Submit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FormItem::class, inversedBy="submits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $FormItem;

    /**
     * @ORM\ManyToOne(targetEntity=Share::class, inversedBy="submits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $share;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $response;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasMultiResponse;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $ipAddress;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormItem(): ?FormItem
    {
        return $this->FormItem;
    }

    public function setFormItem(?FormItem $FormItem): self
    {
        $this->FormItem = $FormItem;

        return $this;
    }

    public function getShare(): ?Share
    {
        return $this->share;
    }

    public function setShare(?Share $share): self
    {
        $this->share = $share;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(string $response): self
    {
        $this->response = $response;

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

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }
}
