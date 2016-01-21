<?php
namespace Composer\Satis\Repository;

use Composer\Config;
use Composer\EventDispatcher\EventDispatcher;
use Composer\IO\IOInterface;
use Composer\Package\AliasPackage;
use Composer\Package\PackageInterface;
use Composer\Repository\Vcs\VcsDriverInterface;
use Composer\Repository\VcsRepository;
use Composer\Package\Package;

class LocalVcs extends VcsRepository
{
    const TYPE_GIT = 'local-git';

    public function __construct(
        array $repoConfig,
        IOInterface $io,
        Config $config,
        EventDispatcher $dispatcher = null,
        array $drivers = null
    ) {
        parent::__construct($repoConfig, $io, $config, $dispatcher, $drivers);
        $this->type = preg_replace('/^local\-/', '', $this->type);
    }

    protected function preProcess(VcsDriverInterface $driver, array $data, $identifier)
    {
        $data = parent::preProcess($driver, $data, $identifier);
        if (isset($data['source']['url'], $this->repoConfig['repository'])) {
            $data['source']['url'] = $this->repoConfig['repository'];
        }
        return $data;
    }
} 
