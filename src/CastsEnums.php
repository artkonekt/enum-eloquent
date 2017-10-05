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

trait CastsEnums
{

    /**
     * Get a plain attribute (not a relationship).
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttributeValue($key)
    {
        if ($this->isEnumAttribute($key)) {
            $class = $this->enums[$key];

            return $class::create($this->getAttributeFromArray($key));
        }

        return parent::getAttributeValue($key);
    }

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if ($this->isEnumAttribute($key)) {
            return $this->getAttributeValue($key);
        }

        return parent::getAttribute($key);
    }

    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        if ($this->isEnumAttribute($key)) {
            $this->attributes[$key] = $value instanceof $this->enums[$key] ? $value->value() : $value;

            return $this;
        }

        parent::setAttribute($key, $value);
    }

    /**
     * Returns whether the attribute was marked as enum
     *
     * @param $key
     *
     * @return bool
     */
    private function isEnumAttribute($key)
    {
        return isset($this->enums[$key]);
    }

}