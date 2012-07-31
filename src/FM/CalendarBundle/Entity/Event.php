<?php

namespace FM\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FM\CalendarBundle\Entity\Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="FM\CalendarBundle\Entity\EventRepository")
 */
class Event
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
     * @var datetime $dtstart
     * @ORM\Column(name="dtstart", type="datetime")
     */
    private $dtstart;

    /**
     *
     * @var datetime $dtend
     * @ORM\Column(name="dtend", type="datetime")
     */
    private $dtend;

    /**
     *
     * @var string $summary
     * @ORM\Column(name="summary", type="string", length=150)
     */
    private $summary;

    /**
     *
     * @var Address $location
     * @ORM\ManyToOne(targetEntity="Address")
     */
    private $location;

    /**
     *
     * @var string $categories
     * @ORM\Column(name="categories", type="string", length=255)
     */
    private $categories;

    /**
     *
     * @var string $status
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     *
     * @var text $description
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     *
     * @var string $transp
     * @ORM\Column(name="transp", type="string", length=255)
     */
    private $transp;

    /**
     *
     * @var Calendar $calendar
     * @ORM\ManyToOne(targetEntity="Calendar", inversedBy="events")
     **/
    private $calendar;

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
     * Set dtstart
     *
     * @param datetime $dtstart
     * @return Event
     */
    public function setDtstart($dtstart)
    {
        $this->dtstart = $dtstart;
        return $this;
    }

    /**
     * Get dtstart
     *
     * @return datetime 
     */
    public function getDtstart()
    {
        return $this->dtstart;
    }

    /**
     * Set dtend
     *
     * @param datetime $dtend
     * @return Event
     */
    public function setDtend($dtend)
    {
        $this->dtend = $dtend;
        return $this;
    }

    /**
     * Get dtend
     *
     * @return datetime 
     */
    public function getDtend()
    {
        return $this->dtend;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Event
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set categories
     *
     * @param string $categories
     * @return Event
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * Get categories
     *
     * @return string 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Event
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
     * Set description
     *
     * @param text $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set transp
     *
     * @param string $transp
     * @return Event
     */
    public function setTransp($transp)
    {
        $this->transp = $transp;
        return $this;
    }

    /**
     * Get transp
     *
     * @return string 
     */
    public function getTransp()
    {
        return $this->transp;
    }

    /**
     * Set location
     *
     * @param FM\CalendarBundle\Entity\Address $location
     * @return Event
     */
    public function setLocation(\FM\CalendarBundle\Entity\Address $location = null)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get location
     *
     * @return FM\CalendarBundle\Entity\Address 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set calendar
     *
     * @param FM\CalendarBundle\Entity\Calendar $calendar
     * @return Event
     */
    public function setCalendar(\FM\CalendarBundle\Entity\Calendar $calendar = null)
    {
        $this->calendar = $calendar;
        return $this;
    }

    /**
     * Get calendar
     *
     * @return FM\CalendarBundle\Entity\Calendar 
     */
    public function getCalendar()
    {
        return $this->calendar;
    }
}