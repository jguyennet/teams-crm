<?php

namespace App\Entity;

use App\Repository\LegalEntityContactRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LegalEntityContactRepository::class)
 */
class LegalEntityContact
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToMany(targetEntity=ExternalIndividualContact::class, mappedBy="LegalEntityContact")
     */
    private $externalIndividualContacts;

    public function __construct()
    {
        $this->externalIndividualContacts = new ArrayCollection();
        $this->created_at = new \DateTime();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(?string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

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
     * @return Collection<int, ExternalIndividualContact>
     */
    public function getExternalIndividualContacts(): Collection
    {
        return $this->externalIndividualContacts;
    }

    public function addExternalIndividualContact(ExternalIndividualContact $externalIndividualContact): self
    {
        if (!$this->externalIndividualContacts->contains($externalIndividualContact)) {
            $this->externalIndividualContacts[] = $externalIndividualContact;
            $externalIndividualContact->addLegalEntityContact($this);
        }

        return $this;
    }

    public function removeExternalIndividualContact(ExternalIndividualContact $externalIndividualContact): self
    {
        if ($this->externalIndividualContacts->removeElement($externalIndividualContact)) {
            $externalIndividualContact->removeLegalEntityContact($this);
        }

        return $this;
    }
}
