<?php
// src/FM/CalendarBundle/DataFixtures/ORM/LoadCalendarData.php

namespace FM\CalendarBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FM\CalendarBundle\Entity\Calendar;

class LoadCalendarData extends AbstractFixture implements OrderedFixtureInterface
{    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $officerCalendar = new Calendar();
        $officerCalendar->setName("Bureau");
        $officerCalendar->setDescription("Seul les membres du bureau pourront voir l'évènement");
        $officerCalendar->setVisibility('restricted');
        $manager->persist($officerCalendar);
        
        $publicCalendar = new Calendar();
        $publicCalendar->setName("Publique");
        $publicCalendar->setDescription("Tout visiteur pourra voir l'évènement");
        $publicCalendar->setVisibility('public');
        $manager->persist($publicCalendar);
        
        $manager->flush();
        
        $this->addReference('calendar-public', $publicCalendar);
        $this->addReference('calendar-office', $officerCalendar);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11;
    }
}

