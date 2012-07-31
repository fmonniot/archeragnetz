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
    
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 12;
    }
}

