<?php

namespace CollegeFBWeb\Adapters\API;

use CollegeFBWeb\Adapters\AdapterAbstract;

class ConferencePrivate extends AdapterAbstract
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
        'url'                   => 'url',
        'rss'                   => 'rss',
        'football_url'          => 'football_url',
        'rss_football'          => 'rss_football',
        'twitter_football'      => 'twitter_football',
        'facebook_football'     => 'facebook_football',
        'youtube_football'      => 'youtube_football',
        'organization'          => 'organization',
    );
}
