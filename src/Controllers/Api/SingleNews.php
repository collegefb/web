<?php

namespace CollegeFBWeb\Controllers\Api;

class SingleNews extends News
{
    protected function get()
    {
        $service = $this->app->container['settings']['di']['news_service'];

        $id_news = func_get_arg(0);

        $this->renderResult($service('OneNews')->run(array('news_id' => $id_news)));
    }

    protected function update()
    {}

    protected function create()
    {}

    protected function remove()
    {}
}
