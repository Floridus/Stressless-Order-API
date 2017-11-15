<?php

namespace AppBundle\Entity;

/**
 * Custommer
 */
class Customer {

    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var \AppBundle\Entity\Table
     */
    private $table;
    
    /**
     * @var string
     */
    private $token;
    
    /**
     * @var boolean
     */
    private $isEnabled;

    /**
     * @var datetime
     */
    private $createdAt;

    /**
     * @var datetime
     */
    private $closedAt;

    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->isEnabled = true;
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
     * Set token
     *
     * @param string $token
     *
     * @return Customer
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     *
     * @return Customer
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Customer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set closedAt
     *
     * @param \DateTime $closedAt
     *
     * @return Customer
     */
    public function setClosedAt($closedAt)
    {
        $this->closedAt = $closedAt;

        return $this;
    }

    /**
     * Get closedAt
     *
     * @return \DateTime
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * Set table
     *
     * @param \AppBundle\Entity\Table $table
     *
     * @return Customer
     */
    public function setTable(\AppBundle\Entity\Table $table = null)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get table
     *
     * @return \AppBundle\Entity\Table
     */
    public function getTable()
    {
        return $this->table;
    }
}
