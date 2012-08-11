<?php

namespace FM\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FM\CalendarBundle\Entity\Calendar
 *
 * @ORM\Table(name="calendars")
 * @ORM\Entity(repositoryClass="FM\CalendarBundle\Entity\CalendarRepository")
 */
class Calendar
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
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     *
     * @var ArrayCollection $events
     * @ORM\OneToMany(targetEntity="Event", mappedBy="calendar", cascade={"persist"})
     */
    private $events;

    /**
     *
     * @var datetime $created_at
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;

    /**
     *
     * @var datetime $updated_at
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated_at;
    
    /**
     *
     * @var string $description
     * @ORM\Column(name="description", type="string", length=150)
     * @Assert\NotBlank()
     */
    private $description;
    
    /**
     *
     * @var string $visibility
     * @ORM\Column(name="visibility", type="string", length=10)
     * @Assert\NotBlank()
     */
    private $visibility;

    public function __construct()
    {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Calendar
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
     * Set created_at
     *
     * @param datetime $createdAt
     * @return Calendar
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
     * @return Calendar
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
     * Add event
     *
     * @param FM\CalendarBundle\Entity\Event $event
     * @return Calendar
     */
    public function addEvent(\FM\CalendarBundle\Entity\Event $event)
    {
        $this->events[] = $event;
        return $this;
    }

    /**
     * Remove events
     *
     * @param <variableType$events
     */
    public function removeEvent(\FM\CalendarBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Calendar
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
     * Set visibility
     *
     * @param string $visibility
     * @return Calendar
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * Get visibility
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }
    
    /**
     * Return name and description concatenated with —
     *
     * @return string
     */
    public function getNameDescription()
    {
        return $this->getName().' — '.$this->getDescription();
    }
}
