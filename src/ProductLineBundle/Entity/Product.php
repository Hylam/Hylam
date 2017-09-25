<?php

namespace ProductLineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProductLineBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;
    
    private $tmp;

    /**
     * @var string
     *
     * @ORM\Column(name="UoM", type="string", length=20)
     */
    private $uoM;

    /**
     * @var array
     *
     * @ORM\Column(name="Specification", type="array", nullable=true)
     */
    private $specification;
    
    public function __toString(){
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set uoM
     *
     * @param string $uoM
     * @return Product
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

    /**
     * Set specification
     *
     * @param array $specification
     * @return Product
     */
    public function setSpecification($specification)
    {
        $this->specification = $specification;

        return $this;
    }

    /**
     * Get specification
     *
     * @return array 
     */
    public function getSpecification()
    {
        return $this->specification;
    }
    
    function getTmp() {
        return $this->tmp;
    }

    function setTmp($tmp) {
        $this->tmp = $tmp;
    }


}
