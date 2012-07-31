<?php
// src/FM/UserBundle/Entity/Event.php
namespace FM\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FM\CalendarBundle\Entity\Event
 *
 * @ORM\Table(name="events")
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
     *
     * @Assert\NotBlank(message="Date de début obligatoire")
     */
    private $dtstart;

    /**
     *
     * @var datetime $dtend
     * @ORM\Column(name="dtend", type="datetime", nullable=true)
     */
    private $dtend;

    /**
     *
     * @var Address $location
     * @ORM\ManyToOne(targetEntity="Address")
     */
    private $location;

    /**
     *
     * @var text $description
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     *
     * @var Calendar $calendar
     * @ORM\ManyToOne(targetEntity="Calendar", inversedBy="events")
     */
    private $calendar;
    
    /**
     *
     * @var string $moreInformation
     * @ORM\Column(name="more_information", type="string", nullable=true)
     */
    private $moreInformation;

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
     * Set calendar
     *
     * @param FM\CalendarBundle\Entity\Calendar $calendar
     * @return Event
     */
    public function setCalendar(\FM\CalendarBundle\Entity\Calendar $calendar = null)
    {
        $calendar->addEvent($this);
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

    /**
     * Set moreInformation
     *
     * @param string $moreInformation
     * @return Event
     */
    public function setMoreInformation($moreInformation)
    {
        $this->moreInformation = $moreInformation;
        return $this;
    }

    /**
     * Get moreInformation
     *
     * @return string 
     */
    public function getMoreInformation()
    {
        return $this->moreInformation;
    }
}
