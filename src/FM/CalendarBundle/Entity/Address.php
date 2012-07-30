<?php

namespace FM\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FM\CalendarBundle\Entity\Address
 *
 * @ORM\Table(name="addresses")
 * @ORM\Entity(repositoryClass="FM\CalendarBundle\Entity\AddressRepository")
 */
class Address
{
    /**
     *
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string $streetName
     * @ORM\Column(name="streetName", type="string", length=150)
     */
    private $streetName;

    /**
     *
     * @var string $additionalComments
     * @ORM\Column(name="additionalComments", type="string", length=150)
     */
    private $additionalComments;

    /**
     *
     * @var string $zipCode
     * @ORM\Column(name="zipCode", type="string", length=10)
     */
    private $zipCode;

    /**
     *
     * @var string $city
     * @ORM\Column(name="city", type="string", length=100)
     */
    private $city;
    
    /**
     *
     * @var ArrayCollection $users
     * @ORM\ManyToMany(targetEntity="User", mappedBy="addresses")
     */
    private $users;


    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set streetName
     *
     * @param string $streetName
     * @return Address
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * Get streetName
     *
     * @return string 
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set additionalComments
     *
     * @param string $additionalComments
     * @return Address
     */
    public function setAdditionalComments($additionalComments)
    {
        $this->additionalComments = $additionalComments;
        return $this;
    }

    /**
     * Get additionalComments
     *
     * @return string 
     */
    public function getAdditionalComments()
    {
        return $this->additionalComments;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * Add users
     *
     * @param FM\CalendarBundle\Entity\User $users
     * @return Address
     */
    public function addUser(\FM\CalendarBundle\Entity\User $users)
    {
        $this->users[] = $users;
        return $this;
    }

    /**
     * Remove users
     *
     * @param <variableType$users
     */
    public function removeUser(\FM\CalendarBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}