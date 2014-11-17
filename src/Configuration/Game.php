<?php

namespace CollegeFBWeb\Configuration;

use Pimple\Container;

class Game implements ConfigurationInterface
{
    public function getConfiguration(Container $container, array $options)
    {
        $container['game_factory'] = function () {
            return new \CollegeFB\Factories\Game();
        };

        $container['game_repository'] = function ($c) {
            return $c['game_factory']->gameRepository($c['database']);
        };

        $container['game_service'] = function ($c) {
            return function ($service) use ($c) {
                $service = $service . 'Service';

                return $c['game_factory']->$service($c['game_repository']);
            };
        };

        $container['game_adapter_private'] = function () {
            return new \CollegeFBWeb\Adapters\API\GamePrivate();
        };

        $container['game_adapter'] = function () {
            return new \CollegeFBWeb\Adapters\API\Game();
        };

        return $container;

    }
}
