<?php
namespace Composer\Satis;

use Composer\Config;
use Composer\EventDispatcher\EventDispatcher;
use Composer\Factory as ComposerFactory;
use Composer\IO\IOInterface;
use Composer\Repository;
use Composer\Satis\Repository\LocalVcs;

class Factory extends ComposerFactory
{
    protected function createRepositoryManager(IOInterface $io, Config $config, EventDispatcher $eventDispatcher = null)
    {
        $repositoryManager = parent::createRepositoryManager($io, $config, $eventDispatcher);
        $repositoryManager->setRepositoryClass(LocalVcs::TYPE_GIT, LocalVcs::class);
        return $repositoryManager;
    }
} 
