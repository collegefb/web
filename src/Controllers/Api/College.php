<?php

namespace CollegeFBWeb\Controllers\Api;

class College extends Colleges
{
    protected function get()
    {
        $service = $this->app->container['settings']['di']['college_service'];

        $id_college = func_get_arg(0);

        $this->renderResult($service('OneCollege')->run(array('college_id' => $id_college)));
    }

    protected function update()
    {
        $service = $this->app->container['settings']['di']['college_service'];

        $id_college = func_get_arg(0);

        $this->renderResult($service('UpdateCollege')->run(json_decode($this->request()->getBody(), true)));
    }

    protected function create()
    {}

    protected function remove()
    {
        $service = $this->app->container['settings']['di']['college_service'];

        $id_college = func_get_arg(0);

        $this->renderResult($service('RemoveCollege')->run(array('college_id' => $id_college)));
    }
}
