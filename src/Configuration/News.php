<?php

namespace CollegeFBWeb\Configuration;

use Pimple\Container;

class News
{
    public function getConfiguration(Container $container, array $options)
    {
        $container['news_factory'] = function () {
            return new \CollegeFB\Factories\News();
        };

        $container['news_repository'] = function ($c) {
            return $c['news_factory']->newsRepository($c['database']);
        };

        $container['news_service'] = function ($c) {
            return function ($service) use ($c) {
                $service = $service . 'Service';

                return $c['news_factory']->$service($c['news_repository']);
            };
        };

        $container['news_adapter_private'] = function () {
            return new \CollegeFBWeb\Adapters\API\NewsPrivate();
        };

        $container['news_adapter'] = function () {
            return new \CollegeFBWeb\Adapters\API\News();
        };

        return $container;

    }
}
