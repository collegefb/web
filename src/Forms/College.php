<?php

namespace CollegeFBWeb\Forms;

class College
{
    private $fields = array(
        'id'                  => array(
            'type'  => 'hidden',
        ),
        'name'                => array(
            'type' => 'text'
        ),
        'nickname'            => array(
            'type' => 'text'
        ),
        'colors'              => array(
            'type' => 'text'
        ),
        'conference'          => array(
            'type' => 'text'
        ),
        'conference_division'   => array(
            'type'  => 'text',
            'label' => 'Conference Division',
        ),
        'division'            => array(
            'type' => 'text'
        ),
        'organization'      => array(
            'type'      => 'text',
            'options'   => array(
                'NCAA'  => 'NCAA',
                'NAIA'  => 'NAIA',
            ),
        ),
        'athletic_director'   => array(
            'type'  => 'text',
            'label' => 'Athletic Director',
        ),
        'head_coach'          => array(
            'type'  => 'text',
            'label' => 'Head Coach',
        ),
        'city'                => array(
            'type' => 'text'
        ),
        'state'               => array(
            'type' => 'text'
        ),
        'location'            => array(
            'type' => 'text'
        ),
        'fbs_since'           => array(
            'type'  => 'text',
            'label' => 'FBS Since',
        ),
        'first_played'        => array(
            'type' => 'text',
            'label' => 'First Game played',
        ),
        'first_season'        => array(
            'type' => 'text',
            'label' => 'First Season',
        ),
        'website'             => array(
            'type' => 'url'
        ),
        'rss'                 => array(
            'type'  => 'url',
            'label' => 'RSS',
        ),
        'facebook'            => array(
            'type' => 'url'
        ),
        'twitter'             => array(
            'type' => 'url'
        ),
        'youtube'             => array(
            'type' => 'url'
        ),
        'football'            => array(
            'type'  => 'url',
            'label' => 'Football URL',
        ),
        'football_rss'        => array(
            'type' => 'url',
            'label' => 'RSS Football',
        ),
        'home_stadium'        => array(
            'type'  => 'text',
            'label' => 'Stadium',
        ),
        'stadium_capacity'    => array(
            'type'  => 'text',
            'label' => 'Stadium Capacity',
        ),
        'stadium_surface'     => array(
            'type' => 'text'
        ),
        'url'                 => array(
            'type' => 'text'
        ),
        'logo'                => array(
            'type' => 'text'
        ),
    );

    public function getForm()
    {
        return $this->fields;
    }
}
