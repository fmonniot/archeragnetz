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
        $manager->persist($officerCalendar);
        
        $publicCalendar = new Calendar();
        $publicCalendar->setName("Publique");
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

