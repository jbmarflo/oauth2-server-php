<?php

namespace Core\Infrastructure\Ui\Api;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator($this->getConfigDir()));
        $loader->load('config.yml');
    }

    private function getConfigDir()
    {
        return __DIR__ . '/Resources/config';
    }
}
