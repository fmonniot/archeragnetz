<?php
// src/FM/CalendarBundle/DataFixtures/ORM/LoadEventData.php

namespace FM\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FM\CalendarBundle\Entity\Event;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $event = new Event();
        $event->setDtstart(new \DateTime("2012-07-25 20:00:00"));
        $event->setDtend(new \DateTime("2012-07-25 22:00:00"));
        $event->setWholeDay(false);
        $event->setDescription("<span class=\"label label-info\">Entrainement</span> Adulte (estival)");
        $event->setCalendar($this->getReference('calendar-public'));
        $event->setCreatedBy($this->getReference('user-asacalendar'));
        $event->setUrl("http://www.archeragnetz.fr/calendrier.html");
        $manager->persist($event);
        
        $event = new Event();
        $event->setDtstart(new \DateTime("2012-07-21 14:00:00"));
        $event->setDtend(new \DateTime("2012-07-21 17:00:00"));
        $event->setWholeDay(false);
        $event->setDescription("<span class=\"label label-important\">Bureau</span> Inventaire du materiel");
        $event->setCalendar($this->getReference('calendar-public'));
        $event->setCreatedBy($this->getReference('user-asacalendar'));
        $manager->persist($event);
        
        $event = new Event();
        $event->setDtstart(new \DateTime("2012-05-22 08:00:00"));
        $event->setDtend(new \DateTime("2012-05-22 9:30:00"));
        $event->setWholeDay(false);
        $event->setDescription("Concours 3D Charger les cibles dans l'utilitaire");
        $event->setCalendar($this->getReference('calendar-office'));
        $event->setCreatedBy($this->getReference('user-asacalendar'));
        $manager->persist($event);
        
        $event = new Event();
        $event->setDtstart(new \DateTime("2012-07-25 20:00:00"));
        $event->setWholeDay(true);
        $event->setDescription("Sans badge");
        $event->setCalendar($this->getReference('calendar-public'));
        $event->setCreatedBy($this->getReference('user-asacalendar'));
        $event->setUrl("http://www.archeragnetz.fr/calendrier.html");
        $manager->persist($event);
        
        $event = new Event();
        $event->setDtstart(new \DateTime("2012-07-25 20:00:00"));
        $event->setDtend(new \DateTime("2012-07-25 22:00:00"));
        $event->setWholeDay(false);
        $event->setDescription("Ou avec des liens \"Plus d'information\". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu mauris non magna ullamcorper faucibus. Duis hendrerit hendrerit odio, vitae pharetra arcu iaculis sed. Suspendisse potenti. Aenean porttitor purus vel nunc varius pharetra. Etiam scelerisque dignissim elit id porta. Sed consectetur venenatis porttitor. Proin pellentesque ante in arcu fermentum a.");
        $event->setCalendar($this->getReference('calendar-public'));
        $event->setCreatedBy($this->getReference('user-asacalendar'));
        $event->setUrl("http://www.archeragnetz.fr/calendrier.html");
        $manager->persist($event);
        
        $event = new Event();
        $event->setDtstart(new \DateTime("2012-07-25 20:00:00"));
        $event->setDtend(new \DateTime("2012-07-25 22:00:00"));
        $event->setWholeDay(false);
        $event->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id faucibus leo. Fusce tempus, sem ut vehicula consectetur, odio est faucibus ipsum, non accumsan elit enim quis turpis. Morbi facilisis felis sed purus semper tincidunt. Sed venenatis dui nibh. Nullam posuere tempor augue, a suscipit sapien condimentum volutpat. Vivamus rutrum velit ac felis consectetur convallis. Aliquam id libero in ante tempus dictum nec adipiscing est. Vestibulum imperdiet orci at turpis tempus rhoncus ut sed.");
        $event->setCalendar($this->getReference('calendar-public'));
        $event->setCreatedBy($this->getReference('user-asacalendar'));
        $event->setUrl("http://www.archeragnetz.fr/calendrier.html");
        $manager->persist($event);
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12;
    }
}

