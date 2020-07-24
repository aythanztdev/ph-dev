<?php

namespace App\Entity;

use App\Repository\BonsaiTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Traits\TimeTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="bonsaiType")
 * @ORM\Entity(repositoryClass=BonsaiTypeRepository::class)
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("name")
 */
class BonsaiType
{
    use TimeTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"bonsaiType:get", "bonsai:get"})
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bonsai", mappedBy="bonsaiType")
     * @Groups({"bonsaiType:get"})
     */
    private $bonsais;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"bonsaiType:get", "bonsai:get"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Groups({"bonsaiType:get", "bonsai:get"})
     */
    private $irrigation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    public function __construct()
    {
        $this->bonsais = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBonsais(): Collection
    {
        return $this->bonsais;
    }

    public function addBonsai(Bonsai $bonsai): self
    {
        if (!$this->bonsais->contains($bonsai)) {
            $this->bonsais[] = $bonsai;
            $bonsai->setBonsaiType($this);
        }

        return $this;
    }

    public function removeBonsai(Bonsai $bonsai): self
    {
        if ($this->bonsais->contains($bonsai)) {
            $this->bonsais->removeElement($bonsai);
            if ($bonsai->getBonsaiType() === $this) {
                $bonsai->setBonsaiType(null);
            }
        }

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIrrigation()
    {
        return $this->irrigation;
    }

    public function setIrrigation($irrigation): self
    {
        $this->irrigation = $irrigation;

        return $this->type;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this->type;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this->type;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this->type;
    }
}
