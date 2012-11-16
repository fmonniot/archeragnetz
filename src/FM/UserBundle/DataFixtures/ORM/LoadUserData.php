<?php
// src/FM/CalendarBundle/DataFixtures/ORM/LoadUserData.php

namespace FM\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FM\CalendarBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();

        $user = $userManager->createUser();

        $user->setUsername('asacalendar');
        $user->setEmail('asacalendar@mail.com');
        $user->setPlainPassword('asacalendar');

        $user->setSurname('ASA');
        $user->setFirstname('Calendar');
        $user->setMobile('+33123456789');

        $user->setEnabled(true);

        $userManager->updateUser($user);

        $this->setReference('user-asacalendar', $user);
    }

    public function getOrder()
    {
        return 10;
    }
}
