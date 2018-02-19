<?php

namespace AppBundle\Application;

use AppBundle\Domain\CommandBus;
use AppBundle\Application\Handler;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class SimpleCommandBus implements CommandBus
{
    use ContainerAwareTrait;

    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    public function execute($command)
    {
        return $this->resolveHandler($command)->handle($command);
    }

    private function resolveHandler($command)
    {
        $tmp = explode('\\', get_class($command));
        $commandName = array_pop($tmp);
        $handlerName = str_replace('Command', 'Handler', $commandName);

        return $this->container->get($handlerName);
    }
}
