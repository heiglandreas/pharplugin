<?php

namespace Org_Heigl\PharPlugin;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\InstallerEvent;
use Composer\Installer\InstallerEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\CommandEvent;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    /** @var  Composer */
    private $composer;

    /** @var  IOInterface */
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
            InstallerEvents::PRE_DEPENDENCIES_SOLVING => [
                ['preDependencySolving', 0],
            ]
        ];
    }

    public function onCommandCall(CommandEvent $event)
    {
        var_Dump($event);// Do something with the event.
    }

    public function preDependencySolving(InstallerEvent $event)
    {
        if (! $event->isDevMode()) {
            // We only work in DEV-Mode. So failing fast!
            return;
        }

        file_put_contents('composer.log', print_r($event->getInstalledRepo(), true), FILE_APPEND);
        file_put_contents('composer.log', print_r($event->getRequest(), true), FILE_APPEND);
        file_put_contents('composer.log', print_r($event->getComposer(), true), FILE_APPEND);
        file_put_contents('composer.log', print_r($event->getOperations(), true), FILE_APPEND);
        file_put_contents('composer.log', print_r($event->getPool(), true), FILE_APPEND);
        file_put_contents('composer.log', print_r($event->getArguments(), true), FILE_APPEND);
        file_put_contents('composer.log', print_r($event->getFlags(), true), FILE_APPEND);
        exit;
    }
}
