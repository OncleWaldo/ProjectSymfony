<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 */
class Salle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CategorySalle::class, inversedBy="salles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Equipment::class, mappedBy="salle", cascade={"persist"})
     */
    private $equipments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $personsMax;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bookable;



    /**
     * @ORM\OneToMany(targetEntity=ThePrice::class, mappedBy="salle", cascade={"persist"})
     */
    private $thePrices;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="salle")
     */
    private $reservations;


    public function __construct()
    {
        $this->equipments = new ArrayCollection();
        $this->thePrices = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?CategorySalle
    {
        return $this->category;
    }

    public function setCategory(?CategorySalle $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments[] = $equipment;
            $equipment->setSalle($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipments->contains($equipment)) {
            $this->equipments->removeElement($equipment);
            // set the owning side to null (unless already changed)
            if ($equipment->getSalle() === $this) {
                $equipment->setSalle(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPersonsMax(): ?int
    {
        return $this->personsMax;
    }

    public function setPersonsMax(int $personsMax): self
    {
        $this->personsMax = $personsMax;

        return $this;
    }

    public function getBookable(): ?bool
    {
        return $this->bookable;
    }

    public function setBookable(bool $bookable): self
    {
        $this->bookable = $bookable;

        return $this;
    }


    

    /**
     * @return Collection|ThePrice[]
     */
    public function getThePrices(): Collection
    {
        return $this->thePrices;
    }

    public function addThePrice(ThePrice $thePrice): self
    {
        if (!$this->thePrices->contains($thePrice)) {
            $this->thePrices[] = $thePrice;
            $thePrice->setSalle($this);
        }

        return $this;
    }

    public function removeThePrice(ThePrice $thePrice): self
    {
        if ($this->thePrices->contains($thePrice)) {
            $this->thePrices->removeElement($thePrice);
            // set the owning side to null (unless already changed)
            if ($thePrice->getSalle() === $this) {
                $thePrice->setSalle(null);
            }
        }

        return $this;
    }
    public function __toString()
{
    return $this->name;
}

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setSalle($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getSalle() === $this) {
                $reservation->setSalle(null);
            }
        }

        return $this;
    }
}
