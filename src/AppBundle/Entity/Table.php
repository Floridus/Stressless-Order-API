<?php

namespace AppBundle\Entity;

/**
 * Table
 */
class Table {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $isOpen;

    /**
     * @var boolean
     */
    private $isEnabled;

    public function __construct() {
        $this->isOpen = true;
        $this->isEnabled = true;
    }


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Table
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set isOpen
     *
     * @param boolean $isOpen
     *
     * @return Table
     */
    public function setIsOpen($isOpen)
    {
        $this->isOpen = $isOpen;

        return $this;
    }

    /**
     * Get isOpen
     *
     * @return boolean
     */
    public function getIsOpen()
    {
        return $this->isOpen;
    }

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     *
     * @return Table
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
}
