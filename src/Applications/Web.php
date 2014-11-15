<?php

namespace CollegeFBWeb\Applications;

use Pimple\Container;

class Web
{
    public function getApp(Container $container)
    {
        $app = new \SlimController\Slim(array(
            'controller.class_prefix'    => 'CollegeFBWeb\\Controllers\\Web',
            'controller.method_suffix'   => 'Action',
            'templates.path'             => $container['web_templates_path'],
            'controller.template_suffix' => 'twig',
            'di'                         => $container,
        ));

        $app->addRoutes(array(
            '/'                             => 'Index:home',
            '/conferences(/:division)'      => 'Conferences:list',
            '/conference/:conference'       => 'Conferences:one',
            '/colleges(/:division)'         => 'Colleges:list',
            '/college/:college'             => 'Colleges:one',
        ));

        $app->view(new \Slim\Views\Twig());
        $app->view->parserExtensions = array(
            new \Slim\Views\TwigExtension(),
        );

        return $app;
    }
}
