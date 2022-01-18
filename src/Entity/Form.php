<?php

namespace App\Entity;

use App\Repository\FormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormRepository::class)
 */
class Form
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="forms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastEditAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTemplate;

    /**
     * @ORM\OneToOne(targetEntity=Template::class, mappedBy="form", cascade={"persist", "remove"})
     */
    private $template;

    /**
     * @ORM\OneToMany(targetEntity=Share::class, mappedBy="form")
     */
    private $shares;

    /**
     * @ORM\OneToMany(targetEntity=FormItem::class, mappedBy="form", orphanRemoval=true)
     */
    private $formItems;

    public function __construct()
    {
        $this->shares = new ArrayCollection();
        $this->formItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLastEditAt(): ?\DateTimeInterface
    {
        return $this->lastEditAt;
    }

    public function setLastEditAt(\DateTimeInterface $lastEditAt): self
    {
        $this->lastEditAt = $lastEditAt;

        return $this;
    }

    public function getIsTemplate(): ?bool
    {
        return $this->isTemplate;
    }

    public function setIsTemplate(bool $isTemplate): self
    {
        $this->isTemplate = $isTemplate;

        return $this;
    }

    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    public function setTemplate(Template $template): self
    {
        // set the owning side of the relation if necessary
        if ($template->getForm() !== $this) {
            $template->setForm($this);
        }

        $this->template = $template;

        return $this;
    }

    /**
     * @return Collection|Share[]
     */
    public function getShares(): Collection
    {
        return $this->shares;
    }

    public function addShare(Share $share): self
    {
        if (!$this->shares->contains($share)) {
            $this->shares[] = $share;
            $share->setForm($this);
        }

        return $this;
    }

    public function removeShare(Share $share): self
    {
        if ($this->shares->removeElement($share)) {
            // set the owning side to null (unless already changed)
            if ($share->getForm() === $this) {
                $share->setForm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FormItem[]
     */
    public function getFormItems(): Collection
    {
        return $this->formItems;
    }

    public function addFormItem(FormItem $formItem): self
    {
        if (!$this->formItems->contains($formItem)) {
            $this->formItems[] = $formItem;
            $formItem->setForm($this);
        }

        return $this;
    }

    public function removeFormItem(FormItem $formItem): self
    {
        if ($this->formItems->removeElement($formItem)) {
            // set the owning side to null (unless already changed)
            if ($formItem->getForm() === $this) {
                $formItem->setForm(null);
            }
        }

        return $this;
    }
}
