<?php

namespace CollegeFBWeb\Controllers\Api;

class Conference extends Conferences
{
    protected function get()
    {
        $service = $this->app->container['settings']['di']['conference_service'];

        $id_conference = func_get_arg(0);

        $this->renderResult($service('OneConference')->run(array('conference_id' => $id_conference)));
    }

    protected function update()
    {
        $service = $this->app->container['settings']['di']['conference_service'];

        $id_conference = func_get_arg(0);

        $this->renderResult($service('UpdateConference')->run(json_decode($this->request()->getBody(), true)));
    }

    protected function create()
    {}

    protected function remove()
    {
        $service = $this->app->container['settings']['di']['conference_service'];

        $id_conference = func_get_arg(0);

        $this->renderResult($service('RemoveConference')->run(array('conference_id' => $id_conference)));
    }
}
