<?php
// src/FM/UserBundle/Entity/User.php
namespace FM\CalendarBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fmuser_user")
 */
class User extends BaseUser
{
    /**
     *
     * @var integer $id
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Mobile Number (format +xxxxxxxxxxx)
     *
     * @var integer $mobile     
     * @ORM\Column(name="mobile_number", type="integer", length=11, nullable=true)
     */
     private $mobile;
     
     /**
      * Address
      *
      * @var ArrayCollection $address
      * @ORM\ManyToMany(targetEntity="Address", inversedBy="users")
      * @ORM\JoinTable(name="users_addresses")
      */
     private $addresss;
     
     
    public function __construct()
    {
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set mobile
     *
     * @param integer $mobile
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * Get mobile
     *
     * @return integer 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Add addresss
     *
     * @param FM\CalendarBundle\Entity\Address $addresss
     * @return User
     */
    public function addAddress(\FM\CalendarBundle\Entity\Address $addresss)
    {
        $this->addresss[] = $addresss;
        return $this;
    }

    /**
     * Remove addresss
     *
     * @param <variableType$addresss
     */
    public function removeAddress(\FM\CalendarBundle\Entity\Address $addresss)
    {
        $this->addresss->removeElement($addresss);
    }

    /**
     * Get addresss
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAddresss()
    {
        return $this->addresss;
    }
}