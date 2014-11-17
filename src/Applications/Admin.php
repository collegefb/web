<?php

namespace CollegeFBWeb\Applications;

use Pimple\Container;

class Admin implements ApplicationInterface
{
    public function getApp(Container $container)
    {
        $app = new \SlimController\Slim(array(
            'controller.class_prefix'    => 'CollegeFBWeb\\Controllers\\Admin',
            'controller.method_suffix'   => 'Action',
            'templates.path'             => $container['admin_templates_path'],
            'controller.template_suffix' => 'twig',
            'di'                         => $container,
        ));

        $app->addRoutes(array(
            '/dashboard'                    => 'Index:dashboard',
            '/logout'                       => 'Index:logout',
            '/login'                        => 'Index:login',
        ));

        $app->view(new \Slim\Views\Twig());
        $app->view->parserExtensions = array(
            new \Slim\Views\TwigExtension(),
        );
        $app->add(new \CollegeFBWeb\Slim\Middleware\Auth('Index:login', 'Index:logout', 'Index:dashboard'));

        return $app;
    }
}
