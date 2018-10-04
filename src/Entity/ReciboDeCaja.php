<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReciboDeCajaRepository")
 */
class ReciboDeCaja
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Banco")
     * @ORM\JoinColumn(nullable=false)
     */
    private $banco;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contrato;

    /**
     * @ORM\Column(type="float")
     */
    private $monto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cruzado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cerrado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaMovimiento;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBanco(): ?Bancos
    {
        return $this->banco;
    }

    public function setBanco(?Bancos $banco): self
    {
        $this->banco = $banco;

        return $this;
    }

    public function getContrato(): ?string
    {
        return $this->contrato;
    }

    public function setContrato(string $contrato): self
    {
        $this->contrato = $contrato;

        return $this;
    }

    public function getMonto(): ?float
    {
        return $this->monto;
    }

    public function setMonto(float $monto): self
    {
        $this->monto = $monto;

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

    public function getCruzado(): ?bool
    {
        return $this->cruzado;
    }

    public function setCruzado(bool $cruzado): self
    {
        $this->cruzado = $cruzado;

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

    public function getFechaMovimiento(): ?\DateTimeInterface
    {
        return $this->fechaMovimiento;
    }

    public function setFechaMovimiento(\DateTimeInterface $fechaMovimiento): self
    {
        $this->fechaMovimiento = $fechaMovimiento;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }
}
