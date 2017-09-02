<?php

namespace ProductLineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warehouse
 *
 * @ORM\Table(name="warehouse")
 * @ORM\Entity(repositoryClass="ProductLineBundle\Repository\WarehouseRepository")
 */
class Warehouse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Material", type="string", length=50)
     */
    private $material;

    /**
     * @var int
     *
     * @ORM\Column(name="Amount", type="integer")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="UoM", type="string", length=20)
     */
    private $uoM;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set material
     *
     * @param string $material
     * @return Warehouse
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return Warehouse
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set uoM
     *
     * @param string $uoM
     * @return Warehouse
     */
    public function setUoM($uoM)
    {
        $this->uoM = $uoM;

        return $this;
    }

    /**
     * Get uoM
     *
     * @return string 
     */
    public function getUoM()
    {
        return $this->uoM;
    }
}
