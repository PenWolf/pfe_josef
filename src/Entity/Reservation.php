<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(formats={"json"})
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
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateReservation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebLoc;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFinLoc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixReservation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $saison;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getDateDebLoc(): ?\DateTimeInterface
    {
        return $this->dateDebLoc;
    }

    public function setDateDebLoc(\DateTimeInterface $dateDebLoc): self
    {
        $this->dateDebLoc = $dateDebLoc;

        return $this;
    }

    public function getDateFinLoc(): ?\DateTimeInterface
    {
        return $this->dateFinLoc;
    }

    public function setDateFinLoc(\DateTimeInterface $dateFinLoc): self
    {
        $this->dateFinLoc = $dateFinLoc;

        return $this;
    }

    public function getPrixReservation(): ?float
    {
        return $this->prixReservation;
    }

    public function setPrixReservation(float $prixReservation): self
    {
        $this->prixReservation = $prixReservation;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }
}
