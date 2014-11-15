<?php

namespace CollegeFBWeb\Controllers\Api;

class Conferences extends \CollegeFBWeb\Slim\RestController
{
    protected function getAdapter()
    {
        return ($this->isPrivateCall()) ?
            $adapter = $this->app->container['settings']['di']['conference_adapter_private']
            : $adapter = $this->app->container['settings']['di']['conference_adapter'];

    }

    protected function get()
    {
        $page = (int) $this->request()->get('page');
        $limit = (int) $this->request()->get('limit');
        $division = $this->request()->get('division');

        $service = $this->app->container['settings']['di']['conference_service'];

        $conferences_list = $service('listConferences')->run(array(
            'page'      => $page,
            'limit'     => $limit,
            'division'  => $division,
        ));

        $this->renderResult($conferences_list);
    }

    protected function update()
    {
        $this->create();
    }

    protected function create()
    {
        $service = $this->app->container['settings']['di']['conference_service'];

        $this->renderResult($service('NewConference')->run(json_decode($this->request()->getBody(), true)));
    }

    protected function remove()
    {}
}
