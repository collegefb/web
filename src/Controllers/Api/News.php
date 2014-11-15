<?php

namespace CollegeFBWeb\Controllers\Api;

class News extends \CollegeFBWeb\Slim\RestController
{
    protected function getAdapter()
    {
        return ($this->isPrivateCall()) ?
            $adapter = $this->app->container['settings']['di']['news_adapter_private']
            : $adapter = $this->app->container['settings']['di']['news_adapter'];

    }

    protected function get()
    {
        $page = (int) $this->request()->get('page');
        $limit = (int) $this->request()->get('limit');
        $origin = $this->request()->get('origin');
        $origin_id = $this->request()->get('origin_id');

        $service = $this->app->container['settings']['di']['news_service'];

        $this->renderResult($service('listNews')->run(array(
            'page'      => $page,
            'limit'     => $limit,
            'origin'    => $origin,
            'origin_id' => $origin_id,
        )));
    }

    protected function update()
    {}

    protected function create()
    {}

    protected function remove()
    {}
}
