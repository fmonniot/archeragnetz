<?php
// src/FM/UserBundle/Entity/Event.php
namespace FM\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
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
     * @var boolean $wholeDay
     * @ORM\Column(name="whole_day", type="boolean", nullable=true)
     * @Assert\Type(type="bool")
     */
    private $wholeDay;

    /**
     *
     * @var Address $location
     * @ORM\Column(name="location", type="string", nullable=true)
     */
    private $location;

    /**
     *
     * @var text $description
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     *
     * @var Calendar $calendar
     * @ORM\ManyToOne(targetEntity="Calendar", inversedBy="events", cascade={"persist"})
     */
    private $calendar;
    
    /**
     *
     * @var string $url
     * @ORM\Column(name="url", type="string", nullable=true)
     * @Assert\Url()
     */
    private $url;
    
    /**
     *
     * @var datetime $created_at
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;
    
    /**
     *
     * @var User $created_by
     * @ORM\ManyToOne(targetEntity="User", inversedBy="events")
     */
    private $created_by;

    /**
     *
     * @var datetime $updated_at
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_at;
    
    /**
     *
     * @var User $updated_by
     * @ORM\ManyToOne(targetEntity="User", inversedBy="events")
     */
    private $updated_by;

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
     * Set wholeDay
     *
     * @param boolean $wholeDay
     * @return Event
     */
    public function setWholeDay($wholeDay)
    {
        $this->wholeDay = $wholeDay;
        return $this;
    }

    /**
     * Is wholeDay
     *
     * @return boolean 
     */
    public function isWholeDay()
    {
        return $this->wholeDay;
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
     * Set Url
     *
     * @param string $url
     * @return Event
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get wholeDay
     *
     * @return boolean 
     */
    public function getWholeDay()
    {
        return $this->wholeDay;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Event
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Event
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     * @return Event
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set created_by
     *
     * @param FM\CalendarBundle\Entity\User $createdBy
     * @return Event
     */
    public function setCreatedBy(\FM\CalendarBundle\Entity\User $createdBy = null)
    {
        $this->created_by = $createdBy;
        return $this;
    }

    /**
     * Get created_by
     *
     * @return FM\CalendarBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set updated_by
     *
     * @param FM\CalendarBundle\Entity\User $updatedBy
     * @return Event
     */
    public function setUpdatedBy(\FM\CalendarBundle\Entity\User $updatedBy = null)
    {
        $this->updated_by = $updatedBy;
        return $this;
    }

    /**
     * Get updated_by
     *
     * @return FM\CalendarBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }
}