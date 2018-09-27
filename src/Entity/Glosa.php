<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GlosaRepository")
 */
class Glosa
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $factura;

    /**
     * @ORM\Column(type="float")
     */
    private $montoRevision;

    /**
     * @ORM\Column(type="float")
     */
    private $montoAcordado;

    /**
     * @ORM\Column(type="float")
     */
    private $porcentaje;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cerrado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaAcuerdo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactura(): ?int
    {
        return $this->factura;
    }

    public function setFactura(int $factura): self
    {
        $this->factura = $factura;

        return $this;
    }

    public function getMontoRevision(): ?float
    {
        return $this->montoRevision;
    }

    public function setMontoRevision(float $montoRevision): self
    {
        $this->montoRevision = $montoRevision;

        return $this;
    }

    public function getMontoAcordado(): ?float
    {
        return $this->montoAcordado;
    }

    public function setMontoAcordado(float $montoAcordado): self
    {
        $this->montoAcordado = $montoAcordado;

        return $this;
    }

    public function getPorcentaje(): ?float
    {
        return $this->porcentaje;
    }

    public function setPorcentaje(float $porcentaje): self
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getCerrado(): ?bool
    {
        return $this->cerrado;
    }

    public function setCerrado(bool $cerrado): self
    {
        $this->cerrado = $cerrado;

        return $this;
    }

    public function getFechaAcuerdo(): ?\DateTimeInterface
    {
        return $this->fechaAcuerdo;
    }

    public function setFechaAcuerdo(?\DateTimeInterface $fechaAcuerdo): self
    {
        $this->fechaAcuerdo = $fechaAcuerdo;

        return $this;
    }
}
