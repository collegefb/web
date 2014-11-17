<?php

namespace CollegeFBWeb\Forms;

class Conference
{
    private $fields = array(
        'id'            => array(
            'type'  => 'hidden',
        ),
        'name'          => array(
            'type'  => 'text',
            'label' => 'Conference Name',
        ),
        'nickname'      => array(
            'type' => 'text',
            'label' => 'Conference Nickname',
        ),
        'established'   => array(
            'type' => 'text',
        ),
        'division'      => array(
            'type' => 'text',
        ),
        'headquarters'  => array(
            'type' => 'text',
        ),
        'commissioner'  => array(
            'type' => 'text',
        ),
        'website'       => array(
            'type' => 'url'
        ),
        'facebook'      => array(
            'type' => 'url'
        ),
        'twitter'       => array(
            'type' => 'url'
        ),
        'youtube'       => array(
            'type' => 'url'
        ),
        'rss'           => array(
            'type' => 'url',
            'label' => 'RSS',
        ),
        'football_url'  => array(
            'type'  => 'url',
            'label' => 'Football URL',
        ),
        'rss_football'  => array(
            'type' => 'url',
            'label' => 'RSS Football',
        ),
        'twitter_football'  => array(
            'type' => 'url',
            'label' => 'Twitter Football',
        ),
        'facebook_football' => array(
            'type' => 'url',
            'label' => 'Facebook Football',
        ),
        'youtube_football'  => array(
            'type' => 'url',
            'label' => 'YouTube Football',
        ),
        'organization'      => array(
            'type'      => 'text',
            'options'   => array(
                'NCAA'  => 'NCAA',
                'NAIA'  => 'NAIA',
            ),
        ),
        'url'           => array(
            'type' => 'text',
        ),
        'logo'          => array(
            'type' => 'text',
        ),
    );

    public function getForm()
    {
        return $this->fields;
    }
}
