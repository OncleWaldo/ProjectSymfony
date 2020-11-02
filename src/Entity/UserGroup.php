<?php

namespace App\Entity;

use App\Repository\UserGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserGroupRepository::class)
 */
class UserGroup
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
    private $name;


    /**
     * @ORM\ManyToMany(targetEntity=ThePrice::class, mappedBy="userGroup", cascade={"persist"})
     */
    private $thePrices;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="userGroup")
     */
    private $users;


    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->thePrices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $thePrice->setUserGroup($this);
        }

        return $this;
    }

    public function removeThePrice(ThePrice $thePrice): self
    {
        if ($this->thePrices->contains($thePrice)) {
            $this->thePrices->removeElement($thePrice);
        }

        return $this;
    }
    public function __toString() 
    {
        return $this->name;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setUserGroup($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUserGroup() === $this) {
                $user->setUserGroup(null);
            }
        }

        return $this;
    }
}
