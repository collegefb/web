<?php

namespace CollegeFBWeb;

use Pimple\Container;

class BootstrapApp
{
    public function getApp($app_to_run, Container $container)
    {
        $app_to_run = '\\CollegeFBWeb\\Applications\\' . ucfirst(strtolower($app_to_run));

        if (class_exists($app_to_run) && in_array('CollegeFBWeb\Applications\ApplicationInterface', class_implements($app_to_run))) {
            return (new $app_to_run)->getApp($container);
        }

        return null;
    }

    public function getContainer(array $options)
    {
        $container = new Container();

        $container = (new \CollegeFBWeb\Configuration\Basic())->getConfiguration($container, $options);
        $container = (new \CollegeFBWeb\Configuration\College())->getConfiguration($container, $options);
        $container = (new \CollegeFBWeb\Configuration\Conference())->getConfiguration($container, $options);
        $container = (new \CollegeFBWeb\Configuration\Game())->getConfiguration($container, $options);
        $container = (new \CollegeFBWeb\Configuration\News())->getConfiguration($container, $options);

        return $container;
    }
}
