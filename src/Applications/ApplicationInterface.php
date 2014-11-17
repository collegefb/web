<?php

namespace CollegeFBWeb\Applications;

use Pimple\Container;

interface ApplicationInterface
{
    public function getApp(Container $container);
}
