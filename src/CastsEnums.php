<?php
/**
 * Contains the CastsEnums trait.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-05
 *
 */


namespace Konekt\Enum\Eloquent;


use Illuminate\Database\Eloquent\Concerns\HasAttributes;

trait CastsEnums
{
    use HasAttributes {
        getAttributeValue as baseGetAttributeValue;
    }

    /**
     * Get a plain attribute (not a relationship).
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttributeValue($key)
    {
        if (isset($this->enums[$key])) {
            $class = $this->enums[$key];

            return $class::create($this->getAttributeFromArray($key));
        }

        return $this->baseGetAttributeValue($key);
    }


}