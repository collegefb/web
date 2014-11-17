<?php

namespace CollegeFBWeb\Adapters\API;

use CollegeFBWeb\Adapters\AdapterAbstract;

class Conference extends AdapterAbstract
{
    protected $element_map = array(
        '_id'                   => 'id',
        'name'                  => 'name',
        'nickname'              => 'nickname',
        'established'           => 'established',
        'division'              => 'division',
        'logo'                  => 'logo',
        'headquarters'          => 'headquarters',
        'commissioner'          => 'commissioner',
        'website'               => 'website',
        'facebook'              => 'facebook',
        'twitter'               => 'twitter',
        'youtube'               => 'youtube',
        'football_url'          => 'football_url',
        'twitter_football'      => 'twitter_football',
        'facebook_football'     => 'facebook_football',
        'youtube_football'      => 'youtube_football',
        'organization'          => 'organization',
    );
}
