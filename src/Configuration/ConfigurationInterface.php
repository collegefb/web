<?php

namespace CollegeFBWeb\Configuration;

use Pimple\Container;

interface ConfigurationInterface
{
    public function getConfiguration(Container $container, array $options);
}
