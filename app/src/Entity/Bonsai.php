<?php


namespace App\Entity;

use App\Repository\BonsaiRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Traits\TimeTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="bonsai")
 * @ORM\Entity(repositoryClass=BonsaiRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Bonsai
{
    use TimeTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"bonsai:get"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BonsaiType", inversedBy="bonsais")
     * @Groups({"bonsai:get"})
     */
    private $bonsaiType;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Groups({"bonsai:get"})
     */
    private $lastFertilization;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank
     * @Groups({"bonsai:get"})
     */
    private $transplanted = false;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Groups({"bonsai:get"})
     */
    private $lastPulverization;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"bonsai:get"})
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBonsaiType(): BonsaiType
    {
        return $this->bonsaiType;
    }

    public function setBonsaiType($bonsaiType): self
    {
        $this->bonsaiType = $bonsaiType;

        return $this;
    }

    public function getLastFertilization()
    {
        return $this->lastFertilization;
    }

    public function setLastFertilization($lastFertilization): self
    {
        $this->lastFertilization = $lastFertilization;

        return $this;
    }

    public function isTransplanted(): bool
    {
        return $this->transplanted;
    }

    public function setTransplanted(bool $transplanted): self
    {
        $this->transplanted = $transplanted;

        return $this;
    }

    public function getLastPulverization()
    {
        return $this->lastPulverization;
    }

    public function setLastPulverization($lastPulverization): self
    {
        $this->lastPulverization = $lastPulverization;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
}