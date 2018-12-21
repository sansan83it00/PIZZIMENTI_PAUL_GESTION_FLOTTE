<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContainerProduct
 *
 * @ORM\Table(name="container_product", indexes={@ORM\Index(name="CONTAINER_PRODUCT_PRODUCT_ID_fk", columns={"PRODUCT_ID"}), @ORM\Index(name="CONTAINER_PRODUCT_CONTAINER_ID_fk", columns={"CONTAINER_ID"})})
 * @ORM\Entity(repositoryClass="App\Repository\ContainerProductRepository")
 */
class ContainerProduct
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
     * @var int|null
     *
     * @ORM\Column(name="QUANTITY", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var \Container
     *
     * @ORM\ManyToOne(targetEntity="Container")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CONTAINER_ID", referencedColumnName="ID")
     * })
     */
    private $container;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PRODUCT_ID", referencedColumnName="ID")
     * })
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getContainer(): ?Container
    {
        return $this->container;
    }

    public function setContainer(?Container $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }


}
