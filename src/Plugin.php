<?php

namespace Org_Heigl\PharPlugin;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\CommandEvent;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    private $composer;

    private $io;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io       = $io;
    }

    public static function getSubscribedEvents()
    {
        return [
            PluginEvents::COMMAND => [
                ['onCommandCall', 0],
            ],
        ];
    }

    public function onCommandCall(CommandEvent $event)
    {
        // Do something with the event.
    }
}

