<?php

namespace App\Entity;

use App\Repository\ShareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShareRepository::class)
 */
class Share
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Form::class, inversedBy="shares")
     * @ORM\JoinColumn(nullable=false)
     */
    private $form;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDatetime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $stopDatetime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasOnlyMember;

    /**
     * @ORM\Column(type="integer")
     */
    private $submitCount;

    /**
     * @ORM\OneToMany(targetEntity=Submit::class, mappedBy="share")
     */
    private $submits;

    public function __construct()
    {
        $this->submits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForm(): ?Form
    {
        return $this->form;
    }

    public function setForm(?Form $form): self
    {
        $this->form = $form;

        return $this;
    }

    public function getStartDatetime(): ?\DateTimeInterface
    {
        return $this->startDatetime;
    }

    public function setStartDatetime(\DateTimeInterface $startDatetime): self
    {
        $this->startDatetime = $startDatetime;

        return $this;
    }

    public function getStopDatetime(): ?\DateTimeInterface
    {
        return $this->stopDatetime;
    }

    public function setStopDatetime(\DateTimeInterface $stopDatetime): self
    {
        $this->stopDatetime = $stopDatetime;

        return $this;
    }

    public function getHasOnlyMember(): ?bool
    {
        return $this->hasOnlyMember;
    }

    public function setHasOnlyMember(bool $hasOnlyMember): self
    {
        $this->hasOnlyMember = $hasOnlyMember;

        return $this;
    }

    public function getSubmitCount(): ?int
    {
        return $this->submitCount;
    }

    public function setSubmitCount(int $submitCount): self
    {
        $this->submitCount = $submitCount;

        return $this;
    }

    /**
     * @return Collection|Submit[]
     */
    public function getSubmits(): Collection
    {
        return $this->submits;
    }

    public function addSubmit(Submit $submit): self
    {
        if (!$this->submits->contains($submit)) {
            $this->submits[] = $submit;
            $submit->setShare($this);
        }

        return $this;
    }

    public function removeSubmit(Submit $submit): self
    {
        if ($this->submits->removeElement($submit)) {
            // set the owning side to null (unless already changed)
            if ($submit->getShare() === $this) {
                $submit->setShare(null);
            }
        }

        return $this;
    }
}
