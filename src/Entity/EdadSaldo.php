<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EdadSaldoRepository")
 */
class EdadSaldo
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
    private $intervaloInicial;

    /**
     * @ORM\Column(type="integer")
     */
    private $intervaloFinal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntervaloInicial(): ?int
    {
        return $this->intervaloInicial;
    }

    public function setIntervaloInicial(int $intervaloInicial): self
    {
        $this->intervaloInicial = $intervaloInicial;

        return $this;
    }

    public function getIntervaloFinal(): ?int
    {
        return $this->intervaloFinal;
    }

    public function setIntervaloFinal(int $intervaloFinal): self
    {
        $this->intervaloFinal = $intervaloFinal;

        return $this;
    }
}
