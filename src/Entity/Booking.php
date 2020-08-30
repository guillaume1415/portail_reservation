<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $beginAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsable;

    /**
     * @ORM\Column(type="float")
     */
    private $number;

    /**
     * @ORM\Column(type="time")
     */
    private $arrive;

    /**
     * @ORM\Column(type="time")
     */
    private $depart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taille_terrain;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_terrain;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Batiment", inversedBy="bookings")
     */
    private $Batiment;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->beginAt;
    }

    public function setBeginAt(\DateTimeInterface $beginAt): self
    {
        $this->beginAt = $beginAt;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->endAt;
    }

    public function setEndAt(?\DateTimeInterface $endAt = null): self
    {
        $this->endAt = $endAt;

        return $this;
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

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getNumber(): ?float
    {
        return $this->number;
    }

    public function setNumber(float $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getArrive(): ?\DateTimeInterface
    {
        return $this->arrive;
    }

    public function setArrive(\DateTimeInterface $arrive): self
    {
        $this->arrive = $arrive;

        return $this;
    }

    public function getDepart(): ?\DateTimeInterface
    {
        return $this->depart;
    }

    public function setDepart(\DateTimeInterface $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getTailleTerrain(): ?string
    {
        return $this->taille_terrain;
    }

    public function setTailleTerrain(string $taille_terrain): self
    {
        $this->taille_terrain = $taille_terrain;

        return $this;
    }





    public function getNomTerrain(): ?string
    {
        return $this->nom_terrain;
    }

    public function setNomTerrain(string $nom_terrain): self
    {
        $this->nom_terrain = $nom_terrain;

        return $this;
    }

    public function getBatiment(): ?Batiment
    {
        return $this->Batiment;
    }

    public function setBatiment(?Batiment $Batiment): self
    {
        $this->Batiment = $Batiment;

        return $this;
    }
}