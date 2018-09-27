<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarteraLogRepository")
 */
class CarteraLog
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
    private $movimiento;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tipoMovimiento;

    /**
     * @ORM\Column(type="integer")
     */
    private $usuario;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovimiento(): ?int
    {
        return $this->movimiento;
    }

    public function setMovimiento(int $movimiento): self
    {
        $this->movimiento = $movimiento;

        return $this;
    }

    public function getTipoMovimiento(): ?string
    {
        return $this->tipoMovimiento;
    }

    public function setTipoMovimiento(string $tipoMovimiento): self
    {
        $this->tipoMovimiento = $tipoMovimiento;

        return $this;
    }

    public function getUsuario(): ?int
    {
        return $this->usuario;
    }

    public function setUsuario(int $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getAccion(): ?bool
    {
        return $this->accion;
    }

    public function setAccion(bool $accion): self
    {
        $this->accion = $accion;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
