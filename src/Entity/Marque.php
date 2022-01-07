<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $marque_libelle;

    /**
     * @ORM\OneToMany(targetEntity=Camion::class, mappedBy="marque")
     */
    private $camions;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="marque")
     */
    private $modele;

    public function __construct()
    {
        $this->camions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque_Libelle(): ?string
    {
        return $this->marque_libelle;
    }

    public function setMarque_Libelle(string $marque_libelle): self
    {
        $this->marque_libelle = $marque_libelle;

        return $this;
    }

    /**
     * @return Collection|Camion[]
     */
    public function getCamions(): Collection
    {
        return $this->camions;
    }

    public function addCamion(Camion $camion): self
    {
        if (!$this->camions->contains($camion)) {
            $this->camions[] = $camion;
            $camion->setMarque($this);
        }

        return $this;
    }

    public function removeCamion(Camion $camion): self
    {
        if ($this->camions->removeElement($camion)) {
            // set the owning side to null (unless already changed)
            if ($camion->getMarque() === $this) {
                $camion->setMarque(null);
            }
        }

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }
}
