<?php

namespace CollegeFBWeb\Adapters\API;

use CollegeFBWeb\Adapters\AdapterAbstract;

class NewsPrivate extends AdapterAbstract
{
    protected $element_map = array(
        '_id'           => 'id',
        'title'         => 'title',
        'link'          => 'link',
        'description'   => 'description',
        'author'        => 'author',
        'pub_date'      => 'pub_date',
        'origin'        => 'origin',
        'origin_id'     => 'origin_id',
    );
}
