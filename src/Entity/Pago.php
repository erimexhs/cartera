<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PagoRepository")
 */
class Pago
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ReciboDeCaja")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reciboDeCaja;

    /**
     * @ORM\Column(type="integer")
     */
    private $factura;

    /**
     * @ORM\Column(type="float")
     */
    private $monto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReciboDeCaja(): ?RecibosDeCaja
    {
        return $this->reciboDeCaja;
    }

    public function setReciboDeCaja(?RecibosDeCaja $reciboDeCaja): self
    {
        $this->reciboDeCaja = $reciboDeCaja;

        return $this;
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

    public function getMonto(): ?float
    {
        return $this->monto;
    }

    public function setMonto(float $monto): self
    {
        $this->monto = $monto;

        return $this;
    }
}
