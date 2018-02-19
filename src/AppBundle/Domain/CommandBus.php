<?php

namespace AppBundle\Domain;

interface CommandBus
{
    public function execute($command);
}
