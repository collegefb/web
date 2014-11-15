<?php

namespace CollegeFBWeb\Controllers\Web;

class Colleges extends \SlimController\SlimController
{
    public function listAction($division = null)
    {
        $this->render('index/home');
    }
}
