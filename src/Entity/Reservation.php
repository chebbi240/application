<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $kilometrage;

    /**
     * @ORM\ManyToOne(targetEntity=camion::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camion;

    /**
     * @ORM\ManyToOne(targetEntity=chauffeur::class, inversedBy="reservations")
     *  @ORM\JoinColumn(nullable=false)
     */
    private $chauffeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getCamion(): ?camion
    {
        return $this->camion;
    }

    public function setCamion(?camion $camion): self
    {
        $this->camion = $camion;

        return $this;
    }

    public function getChauffeur(): ?chauffeur
    {
        return $this->chauffeur;
    }

    public function setChauffeur(?chauffeur $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }
}
