<?php

namespace App\Entity;

use App\Repository\FormItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormItemRepository::class)
 */
class FormItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Form::class, inversedBy="formItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $form;

    /**
     * @ORM\OneToOne(targetEntity=Question::class, cascade={"persist", "remove"})
     */
    private $question;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordinalNumber;

    /**
     * @ORM\OneToMany(targetEntity=Submit::class, mappedBy="FormItem")
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

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getOrdinalNumber(): ?int
    {
        return $this->ordinalNumber;
    }

    public function setOrdinalNumber(int $ordinalNumber): self
    {
        $this->ordinalNumber = $ordinalNumber;

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
            $submit->setFormItem($this);
        }

        return $this;
    }

    public function removeSubmit(Submit $submit): self
    {
        if ($this->submits->removeElement($submit)) {
            // set the owning side to null (unless already changed)
            if ($submit->getFormItem() === $this) {
                $submit->setFormItem(null);
            }
        }

        return $this;
    }
}
