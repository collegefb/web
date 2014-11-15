<?php

namespace CollegeFBWeb\Adapters;

use MongoId;
use MongoDate;
use Iterator;
use ArrayIterator;
use CollegeFB\Entities\EntityAbstract as Entity;

abstract class AdapterAbstract
{
    protected $element_map = array();

    final public function convert($element)
    {
        if ($element instanceof Iterator) {
            return iterator_to_array($this->convertList($element));
        }

        return $this->convertSingle($element);
    }

    private function convertList(Iterator $list)
    {
        $adapted_list = new ArrayIterator();
        foreach ($list as $element) {
            $adapted_list->append($this->convertSingle($element));
        }

        return $adapted_list;
    }

    private function convertSingle(Entity $element)
    {
        $element_array = $element->getData();

        $mapped_element = array();
        foreach ($this->element_map as $key_input => $key_output) {
            $mapped_element[$key_output] = null;
            if (!empty($element_array[$key_input])) {

                if ($element_array[$key_input] instanceof MongoId) {

                    $mapped_element[$key_output] = (string) $element_array[$key_input];

                } elseif ($element_array[$key_input] instanceof MongoDate) {

                    $mapped_element[$key_output] = $element_array[$key_input]->sec;

                } else {

                    $mapped_element[$key_output] = $element_array[$key_input];

                }
            }
        }

        return $mapped_element;
    }
}
