<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="annonce_id", columns={"annonce_id"})})
 * @ORM\Entity
 * @ApiResource
 */
class Annonce
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
     * @var int
     *
     * @ORM\Column(name="annonce_id", type="integer", nullable=false)
     */
    private $annonceId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_jugement", type="date", nullable=false)
     */
    private $dateJugement;

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
     * @ORM\Column(name="commentaires", type="text", length=0, nullable=false)
     */
    private $commentaires;

    /**
     * @var int
     *
     * @ORM\Column(name="dep", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $dep;

    /**
     * @var string
     *
     */
    private $mandataire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceId(): ?int
    {
        return $this->annonceId;
    }

    public function setAnnonceId(int $annonceId): self
    {
        $this->annonceId = $annonceId;

        return $this;
    }

    public function getDateJugement(): ?\DateTimeInterface
    {
        return $this->dateJugement;
    }

    public function setDateJugement(\DateTimeInterface $dateJugement): self
    {
        $this->dateJugement = $dateJugement;

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

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(string $commentaires): self
    {
        $this->commentaires = $commentaires;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getMandataire()
    {
        return $this->mandataire;
    }

    public function setMandataire($mandataire): self
    {
        $this->mandataire = $mandataire;

        return $this;
    }
}
