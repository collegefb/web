<?php

namespace CollegeFBWeb\Controllers\Web;

class Index extends \SlimController\SlimController
{
    public function homeAction()
    {
        $news_service = $this->app->container['settings']['di']['news_service'];

        $this->render('index/home', array(
            'news'            => $this->app->container['settings']['di']['news_adapter_private']->convert($news_service('listNews')->run(array(
                'origin'      => 'organization',
                'limit'       => 25,
            ))),
        ));
    }
}
