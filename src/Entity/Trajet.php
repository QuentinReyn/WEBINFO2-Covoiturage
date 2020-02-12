<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrajetRepository")
 */
class Trajet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $places;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="trajetsdepart")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieudepart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="trajetsarrivee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieuarrivee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="conducteurtrajets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="trajets")
     */
    private $passager;

    public function __construct()
    {
        $this->passager = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): self
    {
        $this->places = $places;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getLieudepart(): ?Lieu
    {
        return $this->lieudepart;
    }

    public function setLieudepart(?Lieu $lieudepart): self
    {
        $this->lieudepart = $lieudepart;

        return $this;
    }

    public function getLieuarrivee(): ?Lieu
    {
        return $this->lieuarrivee;
    }

    public function setLieuarrivee(?Lieu $lieuarrivee): self
    {
        $this->lieuarrivee = $lieuarrivee;

        return $this;
    }

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPassager(): Collection
    {
        return $this->passager;
    }

    public function addPassager(User $passager): self
    {
        if (!$this->passager->contains($passager)) {
            $this->passager[] = $passager;
        }

        return $this;
    }

    public function removePassager(User $passager): self
    {
        if ($this->passager->contains($passager)) {
            $this->passager->removeElement($passager);
        }

        return $this;
    }
}
