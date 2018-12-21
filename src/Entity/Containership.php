<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Containership
 *
 * @ORM\Table(name="containership")
 * @ORM\Entity(repositoryClass="App\Repository\ContainershipRepository")
 */
class Containership
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NAME", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CAPTAIN_NAME", type="string", length=255, nullable=true)
     */
    private $captainName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CONTAINER_LIMIT", type="integer", nullable=true)
     */
    private $containerLimit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCaptainName(): ?string
    {
        return $this->captainName;
    }

    public function setCaptainName(?string $captainName): self
    {
        $this->captainName = $captainName;

        return $this;
    }

    public function getContainerLimit(): ?int
    {
        return $this->containerLimit;
    }

    public function setContainerLimit(?int $containerLimit): self
    {
        $this->containerLimit = $containerLimit;

        return $this;
    }


}
