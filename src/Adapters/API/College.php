<?php

namespace CollegeFBWeb\Adapters\API;

use CollegeFBWeb\Adapters\AdapterAbstract;

class College extends AdapterAbstract
{
    protected $element_map = array(
        '_id'                   => 'id',
        'athletic_director'     => 'director',
        'colors'                => 'colors',
        'conference'            => 'conference',
        'conference_division'   => 'conference_division',
        'division'              => 'division',
        'facebook'              => 'facebook',
        'facebook_football'     => 'facebook_football',
        'first_season'          => 'first_season',
        'football'              => 'football',
        'head_coach'            => 'head_coach',
        'home_stadium'          => 'home_stadium',
        'location'              => 'location',
        'logo'                  => 'logo',
        'name'                  => 'name',
        'nickname'              => 'nickname',
        'organization'          => 'organization',
        'rivals'                => 'rivals',
        'stadium_capacity'      => 'stadium_capacity',
        'stadium_surface'       => 'stadium_surface',
        'twitter'               => 'twitter',
        'twitter_football'      => 'twitter_football',
        'website'               => 'website',
        'youtube'               => 'youtube',
        'youtube_football'      => 'youtube_football',
    );
}
