<?php

namespace App\Entity;

use App\Repository\ThePriceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThePriceRepository::class)
 */
class ThePrice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $amountBergerac;

    /**
     * @ORM\Column(type="integer")
     */
    private $amountHorsBergerac;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class, inversedBy="thePrices" )
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity=UserGroup::class, inversedBy="thePrices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userGroup;



    public function getId(): ?int
    {
        return $this->id;
    }

   
    
    public function getAmountBergerac(): ?int
    {
        return $this->amountBergerac;
    }

    public function setAmountBergerac(int $amountBergerac): self
    {
        $this->amountBergerac = $amountBergerac;

        return $this;
    }

    public function getAmountHorsBergerac(): ?int
    {
        return $this->amountHorsBergerac;
    }

    public function setAmountHorsBergerac(int $amountHorsBergerac): self
    {
        $this->amountHorsBergerac = $amountHorsBergerac;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }
    public function __toString()
    {
        return (string)$this->amountBergerac;
    }

    public function getUserGroup(): ?UserGroup
    {
        return $this->userGroup;
    }

    public function setUserGroup(?UserGroup $userGroup): self
    {
        $this->userGroup = $userGroup;

        return $this;
    }
}
