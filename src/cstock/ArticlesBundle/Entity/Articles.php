<?php

namespace cstock\ArticlesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Articles {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\Column(type="string", length=100)
    */
    protected $code;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    protected $name;

    /**
    * @ORM\Column(type="text", nullable=true)
    */
    protected $description;

    /**
    * @ORM\Column(type="string", length=100, nullable=true)
    */
    protected $reference;

    /**
    * @ORM\Column(type="integer", length=6, nullable=true)
    */
    protected $heading;


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
     * Set code
     *
     * @param string $code
     * @return Articles
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Articles
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
     * Set description
     *
     * @param string $description
     * @return Articles
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Articles
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    
        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set heading
     *
     * @param integer $heading
     * @return Articles
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    
        return $this;
    }

    /**
     * Get heading
     *
     * @return integer 
     */
    public function getHeading()
    {
        return $this->heading;
    }
}