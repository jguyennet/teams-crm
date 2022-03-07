<?php

namespace App\Entity;

use App\Repository\ExternalIndividualContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExternalIndividualContactRepository::class)
 */
class ExternalIndividualContact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=LegalEntityContact::class, inversedBy="externalIndividualContacts")
     */
    private $LegalEntityContact;

    public function __construct()
    {
        $this->LegalEntityContact = new ArrayCollection();
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection<int, LegalEntityContact>
     */
    public function getLegalEntityContact(): Collection
    {
        return $this->LegalEntityContact;
    }

    public function addLegalEntityContact(LegalEntityContact $legalEntityContact): self
    {
        if (!$this->LegalEntityContact->contains($legalEntityContact)) {
            $this->LegalEntityContact[] = $legalEntityContact;
        }

        return $this;
    }

    public function removeLegalEntityContact(LegalEntityContact $legalEntityContact): self
    {
        $this->LegalEntityContact->removeElement($legalEntityContact);

        return $this;
    }
}
