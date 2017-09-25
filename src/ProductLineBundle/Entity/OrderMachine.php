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
     * @ORM\Column(name="Product_ID", type="string")
     */
    private $productName;

    /**
     * @var int
     *
     * @ORM\Column(name="OrderAmount", type="integer")
     */
    private $orderAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=15, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartDate", type="datetimetz")
     */
    private $startDate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EndDate", type="datetimetz", nullable = true )
     */
    private $endDate;
    
    /**
     * @var int
     *
     * @ORM\Column(name="machineNumber", type="integer")
     */
    private $machineNumber;
    
    /**
     * Get machineNumber
     *
     * @return integer 
     */    
    
    
    function getMachineNumber() {
        return $this->machineNumber;
    }

    /**
     * Set machineNumber
     *
     * @param integer $machineNumber
     * @return OrderMachine
     */   
    
    function setMachineNumber(int $machineNumber) {
        $this->machineNumber = $machineNumber;
    }

        
    
  
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
     * Set productName
     *
     * @param string $productName
     * @return OrderMachine
     */
    
    function setProductName($productName) {
        $this->productName = $productName;
    }

    
    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
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
    
    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return OrderMachine
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

}
