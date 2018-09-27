<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImpuestoPagoRepository")
 */
class ImpuestoPago
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Impuesto")
     * @ORM\JoinColumn(nullable=false)
     */
    private $impuesto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pago")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pago;

    /**
     * @ORM\Column(type="float")
     */
    private $porcentaje;

    /**
     * @ORM\Column(type="float")
     */
    private $valorPorcentaje;

    /**
     * @ORM\Column(type="float")
     */
    private $baseRetencion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImpuesto(): ?Impuestos
    {
        return $this->impuesto;
    }

    public function setImpuesto(?Impuestos $impuesto): self
    {
        $this->impuesto = $impuesto;

        return $this;
    }

    public function getPago(): ?Pagos
    {
        return $this->pago;
    }

    public function setPago(?Pagos $pago): self
    {
        $this->pago = $pago;

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

    public function getValorPorcentaje(): ?float
    {
        return $this->valorPorcentaje;
    }

    public function setValorPorcentaje(float $valorPorcentaje): self
    {
        $this->valorPorcentaje = $valorPorcentaje;

        return $this;
    }

    public function getBaseRetencion(): ?float
    {
        return $this->baseRetencion;
    }

    public function setBaseRetencion(float $baseRetencion): self
    {
        $this->baseRetencion = $baseRetencion;

        return $this;
    }
}
