<?php

namespace CollegeFBWeb\Configuration;

use Pimple\Container;

class College implements ConfigurationInterface
{
    public function getConfiguration(Container $container, array $options)
    {
        $container['college_factory'] = function () {
            return new \CollegeFB\Factories\College();
        };

        $container['college_repository'] = function ($c) {
            return $c['college_factory']->collegeRepository($c['database']);
        };

        $container['college_service'] = function ($c) {
            return function ($service) use ($c) {
                $service = $service . 'Service';

                return $c['college_factory']->$service($c['college_repository']);
            };
        };

        $container['college_adapter_private'] = function () {
            return new \CollegeFBWeb\Adapters\API\CollegePrivate();
        };

        $container['college_adapter'] = function () {
            return new \CollegeFBWeb\Adapters\API\College();
        };

        $container['college_form'] = function () {
            return new \CollegeFBWeb\Forms\College();
        };

        return $container;

    }
}
