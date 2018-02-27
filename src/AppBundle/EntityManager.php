<?php

namespace AppBundle;

class EntityManager
{
    public function persist($entity)
    {
        echo get_class($entity) . ' object persisted';
    }

    public function flush()
    {
    }
}
