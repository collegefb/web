<?php

namespace CollegeFBWeb\Configuration;

use Pimple\Container;
use MongoClient;

class Basic
{
    public function getConfiguration(Container $container, array $options)
    {
        $container['environment'] = function () {
            $environment = getenv('ENVIRONMENT');

            return (!empty($environment)) ? $environment : 'PRODUCTION';
        };

        $container['database'] = function () use ($options) {
            $m = new MongoClient();

            return $m->selectDB($options['database']);
        };

        $container['twitter'] = function () use ($options) {
            return array(
                'key'       => $options['twitter']['key'],
                'secret'    => $options['twitter']['secret'],
            );
        };

        $container['auth_users'] = function () use ($options) {
            return $options['twitter']['auth_users'];
        };

        $container['xauth_token'] = function () use ($options) {
            return $options['xauth_token'];
        };

        $container['admin_templates_path'] = function () use ($options) {
            return $options['admin_templates_path'];
        };

        $container['web_templates_path'] = function () use ($options) {
            return $options['web_templates_path'];
        };

        return $container;

    }
}
