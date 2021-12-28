<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele_libelle;

    /**
     * @ORM\OneToMany(targetEntity=Marque::class, mappedBy="modele")
     */
    private $Marque;

    public function __construct()
    {
        $this->Marque = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeleLibelle(): ?string
    {
        return $this->modele_libelle;
    }

    public function setModeleLibelle(string $modele_libelle): self
    {
        $this->modele_libelle = $modele_libelle;

        return $this;
    }

    /**
     * @return Collection|Marque[]
     */
    public function getMarque(): Collection
    {
        return $this->Marque;
    }

    public function addMarque(Marque $marque): self
    {
        if (!$this->Marque->contains($marque)) {
            $this->Marque[] = $marque;
            $marque->setModele($this);
        }

        return $this;
    }

    public function removeMarque(Marque $marque): self
    {
        if ($this->Marque->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getModele() === $this) {
                $marque->setModele(null);
            }
        }

        return $this;
    }
}
