<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Container
 *
 * @ORM\Table(name="container", uniqueConstraints={@ORM\UniqueConstraint(name="CONTAINER_ID_uindex", columns={"ID"})}, indexes={@ORM\Index(name="CONTAINER_CONTAINER_MODEL_ID_fk", columns={"CONTAINER_MODEL_ID"}), @ORM\Index(name="CONTAINER_CONTAINERSHIP_ID_fk", columns={"CONTAINERSHIP_ID"})})
 * @ORM\Entity(repositoryClass="App\Repository\ContainerRepository")
 */
class Container
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
     * @ORM\Column(name="COLOR", type="string", length=20, nullable=true)
     */
    private $color;

    /**
     * @var \Containership
     *
     * @ORM\ManyToOne(targetEntity="Containership")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CONTAINERSHIP_ID", referencedColumnName="ID")
     * })
     */
    private $containership;

    /**
     * @var \ContainerModel
     *
     * @ORM\ManyToOne(targetEntity="ContainerModel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CONTAINER_MODEL_ID", referencedColumnName="ID")
     * })
     */
    private $containerModel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getContainership(): ?Containership
    {
        return $this->containership;
    }

    public function setContainership(?Containership $containership): self
    {
        $this->containership = $containership;

        return $this;
    }

    public function getContainerModel(): ?ContainerModel
    {
        return $this->containerModel;
    }

    public function setContainerModel(?ContainerModel $containerModel): self
    {
        $this->containerModel = $containerModel;

        return $this;
    }


}
