<?php

namespace CollegeFBWeb\Controllers\Api;

class Colleges extends \CollegeFBWeb\Slim\RestController
{
    protected function getAdapter()
    {
        return ($this->isPrivateCall()) ?
            $adapter = $this->app->container['settings']['di']['college_adapter_private']
            : $adapter = $this->app->container['settings']['di']['college_adapter'];
    }

    protected function get()
    {
        $page = (int) $this->request()->get('page');
        $limit = (int) $this->request()->get('limit');

        $service = $this->app->container['settings']['di']['college_service'];

        $colleges_list = $service('listColleges')->run(array(
            'page'  => $page,
            'limit' => $limit,
        ));

        $this->renderResult($colleges_list);
    }

    protected function update()
    {
        $this->create();
    }

    protected function create()
    {
        $service = $this->app->container['settings']['di']['college_service'];

        $this->renderResult($service('NewCollege')->run(json_decode($this->request()->getBody(), true)));
    }

    protected function remove()
    {}
}
