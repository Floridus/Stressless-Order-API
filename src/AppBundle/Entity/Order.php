<?php

namespace AppBundle\Entity;

/**
 * Order
 */
class Order {

    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var \AppBundle\Entity\Customer
     */
    private $customer;
    
    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;
    
    /**
     * @var datetime
     */
    private $orderTime;
    
    /**
     * @var text
     */
    private $notice;
    
    /**
     * @var integer
     */
    private $amount;
    
    /**
     * @var string
     */
    private $browser;
    
    /**
     * @var string
     */
    private $operatingSystem;
    
    /**
     * @var boolean
     */
    private $isOrdered;
    
    /**
     * @var boolean
     */
    private $isCanceled;
    
    /**
     * @var boolean
     */
    private $isReady;

    public function __construct() {
        $this->orderTime = new \DateTime();
        $this->isOrdered = false;
        $this->isCanceled = false;
        $this->isReady = false;
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
     * Set orderTime
     *
     * @param \DateTime $orderTime
     *
     * @return Order
     */
    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;

        return $this;
    }

    /**
     * Get orderTime
     *
     * @return \DateTime
     */
    public function getOrderTime()
    {
        return $this->orderTime;
    }

    /**
     * Set notice
     *
     * @param string $notice
     *
     * @return Order
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;

        return $this;
    }

    /**
     * Get notice
     *
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Order
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
     * Set browser
     *
     * @param string $browser
     *
     * @return Order
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set operatingSystem
     *
     * @param string $operatingSystem
     *
     * @return Order
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * Get operatingSystem
     *
     * @return string
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Set isOrdered
     *
     * @param boolean $isOrdered
     *
     * @return Order
     */
    public function setIsOrdered($isOrdered)
    {
        $this->isOrdered = $isOrdered;

        return $this;
    }

    /**
     * Get isOrdered
     *
     * @return boolean
     */
    public function getIsOrdered()
    {
        return $this->isOrdered;
    }

    /**
     * Set isCanceled
     *
     * @param boolean $isCanceled
     *
     * @return Order
     */
    public function setIsCanceled($isCanceled)
    {
        $this->isCanceled = $isCanceled;

        return $this;
    }

    /**
     * Get isCanceled
     *
     * @return boolean
     */
    public function getIsCanceled()
    {
        return $this->isCanceled;
    }

    /**
     * Set isReady
     *
     * @param boolean $isReady
     *
     * @return Order
     */
    public function setIsReady($isReady)
    {
        $this->isReady = $isReady;

        return $this;
    }

    /**
     * Get isReady
     *
     * @return boolean
     */
    public function getIsReady()
    {
        return $this->isReady;
    }

    /**
     * Set customer
     *
     * @param \AppBundle\Entity\Customer $customer
     *
     * @return Order
     */
    public function setCustomer(\AppBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Order
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
