<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LieuRepository")
 */
class Lieu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trajet", mappedBy="lieudepart")
     */
    private $trajetsdepart;

    public function __construct()
    {
        $this->trajetsdepart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getTrajetsdepart(): Collection
    {
        return $this->trajetsdepart;
    }

    public function addTrajetsdepart(Trajet $trajetsdepart): self
    {
        if (!$this->trajetsdepart->contains($trajetsdepart)) {
            $this->trajetsdepart[] = $trajetsdepart;
            $trajetsdepart->setLieudepart($this);
        }

        return $this;
    }

    public function removeTrajetsdepart(Trajet $trajetsdepart): self
    {
        if ($this->trajetsdepart->contains($trajetsdepart)) {
            $this->trajetsdepart->removeElement($trajetsdepart);
            // set the owning side to null (unless already changed)
            if ($trajetsdepart->getLieudepart() === $this) {
                $trajetsdepart->setLieudepart(null);
            }
        }

        return $this;
    }
}
