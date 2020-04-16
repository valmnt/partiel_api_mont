<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class FailAuthSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist
        ];
    }

    public function prePersist(LifecycleEventArgs $lifecycleEventArgs)
    {
        $object = $lifecycleEventArgs->getObject();

        if ($object instanceof User) {
            $object->setFailedAuth(0);
        }
    }
}
