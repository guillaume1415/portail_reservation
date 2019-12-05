<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeRepository")
 */
class Demande
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
    private $endAt = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome_salle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $strat_arrive;

    /**
     * @ORM\Column(type="datetime")
     */
    private $bake;

    /**
     * @ORM\Column(type="float", nullable=true)
     *  * @Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $taille_terrain;

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

    public function getNomeSalle(): ?string
    {
        return $this->nome_salle;
    }

    public function setNomeSalle(string $nome_salle): self
    {
        $this->nome_salle = $nome_salle;

        return $this;
    }

    public function getStratArrive(): ?\DateTimeInterface
    {
        return $this->strat_arrive;
    }

    public function setStratArrive(\DateTimeInterface $strat_arrive): self
    {
        $this->strat_arrive = $strat_arrive;

        return $this;
    }

    public function getBake(): ?\DateTimeInterface
    {
        return $this->bake;
    }

    public function setBake(\DateTimeInterface $bake): self
    {
        $this->bake = $bake;

        return $this;
    }

    public function getTailleTerrain(): ?float
    {
        return $this->taille_terrain;
    }

    public function setTailleTerrain(?float $taille_terrain): self
    {
        $this->taille_terrain = $taille_terrain;

        return $this;
    }
}
