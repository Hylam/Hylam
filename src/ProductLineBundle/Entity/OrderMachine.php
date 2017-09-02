<?php

namespace ProductLineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderMachine
 *
 * @ORM\Table(name="order_machine")
 * @ORM\Entity(repositoryClass="ProductLineBundle\Repository\OrderMachineRepository")
 */
class OrderMachine
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
     * @var int
     *
     * @ORM\Column(name="Oder_Number", type="integer")
     */
    private $oderNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="Product_ID", type="integer")
     */
    private $productID;

    /**
     * @var int
     *
     * @ORM\Column(name="OrderAmount", type="integer")
     */
    private $orderAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=15)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartDate", type="datetimetz")
     */
    private $startDate;


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
     * Set oderNumber
     *
     * @param integer $oderNumber
     * @return OrderMachine
     */
    public function setOderNumber($oderNumber)
    {
        $this->oderNumber = $oderNumber;

        return $this;
    }

    /**
     * Get oderNumber
     *
     * @return integer 
     */
    public function getOderNumber()
    {
        return $this->oderNumber;
    }

    /**
     * Set productID
     *
     * @param integer $productID
     * @return OrderMachine
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;

        return $this;
    }

    /**
     * Get productID
     *
     * @return integer 
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * Set orderAmount
     *
     * @param integer $orderAmount
     * @return OrderMachine
     */
    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;

        return $this;
    }

    /**
     * Get orderAmount
     *
     * @return integer 
     */
    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return OrderMachine
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return OrderMachine
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
}
