<?php

namespace CollegeFBWeb\Applications;

use Pimple\Container;

class Api
{
    public function getApp(Container $container)
    {
        $app = new \SlimController\Slim(array(
            'controller.class_prefix'    => 'CollegeFBWeb\\Controllers\\Api',
            'controller.method_suffix'   => 'Action',
            'di'                         => $container,
        ));

        $app->addRoutes(array(
            '/'                             => 'Index:index',
            '/colleges(/)'                  => 'Colleges:index',
            '/colleges/:id_college'         => 'College:index',
            '/conferences(/)'               => 'Conferences:index',
            '/conferences/:id_conference'   => 'Conference:index',
            '/news(/)'                      => 'News:index',
            '/news/:id_news'                => 'SingleNews:index',
        ));

        $app->add(new \SlimJson\Middleware(array(
            'json.status'               => false,
            'json.override_error'       => true,
            'json.override_notfound'    => true,
            'json.cors'                 => true,
        )));

        return $app;
    }
}
