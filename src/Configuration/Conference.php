<?php

namespace CollegeFBWeb\Configuration;

use Pimple\Container;

class Conference implements ConfigurationInterface
{
    public function getConfiguration(Container $container, array $options)
    {
        $container['conference_factory'] = function () {
            return new \CollegeFB\Factories\Conference();
        };

        $container['conference_repository'] = function ($c) {
            return $c['conference_factory']->conferenceRepository($c['database']);
        };

        $container['conference_service'] = function ($c) {
            return function ($service) use ($c) {
                $service = $service . 'Service';

                return $c['conference_factory']->$service($c['conference_repository']);
            };
        };

        $container['conference_adapter_private'] = function () {
            return new \CollegeFBWeb\Adapters\API\ConferencePrivate();
        };

        $container['conference_adapter'] = function () {
            return new \CollegeFBWeb\Adapters\API\Conference();
        };

        $container['conference_form'] = function () {
            return new \CollegeFBWeb\Forms\Conference();
        };

        return $container;

    }
}
