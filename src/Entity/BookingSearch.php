<?php

namespace App\Entity;
use App\Entity\Batiment;

use Doctrine\Common\Collections\ArrayCollection;



class BookingSearch
{
//    /**
//     * @ORM\Id()
//     * @ORM\GeneratedValue()
//     * @ORM\Column(type="integer")
//     */
//    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var Batiment[]
     */
    public $batiments = [];

//    public function __construct()
//    {
//        $this->batiments = new ArrayCollection();
//    }

//    public function getId(): ?int
//    {
//        return $this->id;
//    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
//    public function getBatiments(): Arraycollection
//    {
//        return $this->batiments;
//    }


//    public function setBatiments(ArrayCollection $batiments): self
//    {
//        $this->batiments = $batiments;
//        return $this;
//    }

}
