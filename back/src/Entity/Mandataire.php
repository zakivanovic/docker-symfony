<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Mandataire
 *
 * @ORM\Table(name="mandataire", indexes={@ORM\Index(name="siren", columns={"siren", "nic"}), @ORM\Index(name="zipcode", columns={"zipcode"}), @ORM\Index(name="custom_matching_2", columns={"adresse"})})
 * @ORM\Entity
 * @ApiResource
 */
class Mandataire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="identity", type="string", length=255, nullable=false)
     */
    private $identity;

    /**
     * @var int
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $zipcode;

    /**
     * @var int
     *
     * @ORM\Column(name="dep", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $dep;

    /**
     * @var int
     *
     * @ORM\Column(name="siren", type="integer", nullable=false)
     */
    private $siren;

    /**
     * @var int
     *
     * @ORM\Column(name="nic", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $nic;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=65535, nullable=false)
     */
    private $adresse;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentity(): ?string
    {
        return $this->identity;
    }

    public function setIdentity(string $identity): self
    {
        $this->identity = $identity;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getDep(): ?int
    {
        return $this->dep;
    }

    public function setDep(int $dep): self
    {
        $this->dep = $dep;

        return $this;
    }

    public function getSiren(): ?int
    {
        return $this->siren;
    }

    public function setSiren(int $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getNic(): ?int
    {
        return $this->nic;
    }

    public function setNic(int $nic): self
    {
        $this->nic = $nic;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
