<?php

namespace CollegeFBWeb\Controllers\Api;

class Index extends \SlimController\SlimController
{
    public function indexAction()
    {
        $this->render(200, array(
            'msg' => 'welcome to my API!',
        ));
    }
}
