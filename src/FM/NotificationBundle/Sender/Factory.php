<?php
namespace FM\NotificationBundle\Sender;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * @author francois
 *
 */

class Factory extends ContainerAware
{
    public function create($serviceId)
    {
        var_dump($serviceId, $this->container);
        return $this->container->get($serviceId);
    }
}
