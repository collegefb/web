<?php

namespace CollegeFBWeb\Adapters\API;

use CollegeFBWeb\Adapters\AdapterAbstract;

class CollegePrivate extends AdapterAbstract
{
    protected $element_map = array(
        '_id'                   => 'id',
        'athletic_director'     => 'athletic_director',
        'city'                  => 'city',
        'colors'                => 'colors',
        'conference'            => 'conference',
        'conference_division'   => 'conference_division',
        'division'              => 'division',
        'facebook'              => 'facebook',
        'fbs_since'             => 'fbs_since',
        'first_played'          => 'first_played',
        'first_season'          => 'first_season',
        'football'              => 'football',
        'football_rss'          => 'football_rss',
        'head_coach'            => 'head_coach',
        'home_stadium'          => 'home_stadium',
        'location'              => 'location',
        'logo'                  => 'logo',
        'name'                  => 'name',
        'nickname'              => 'nickname',
        'organization'          => 'organization',
        'rivals'                => 'rivals',
        'rss'                   => 'rss',
        'stadium_capacity'      => 'stadium_capacity',
        'stadium_surface'       => 'stadium_surface',
        'state'                 => 'state',
        'twitter'               => 'twitter',
        'url'                   => 'url',
        'website'               => 'website',
        'youtube'               => 'youtube',
    );
}
