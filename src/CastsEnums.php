<?php
/**
 * Contains the CastsEnums trait.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @author      Nick Rupert
 * @license     MIT
 * @since       2017-10-05
 *
 */

namespace Konekt\Enum\Eloquent;

use Illuminate\Support\Str;

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
            $class = $this->getEnumClass($key);

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
            $enumClass = $this->getEnumClass($key);
            if (! $value instanceof $enumClass) {
                $value = new $enumClass($value);
            }

            $this->attributes[$key] = $value->value();

            return $this;
        }

        parent::setAttribute($key, $value);
    }

    /**
     * Convert the model's attributes to an array.
     *
     * @return array
     */
    public function attributesToArray()
    {
        return $this->addEnumAttributesToArray(parent::attributesToArray());
    }

    /**
     * Returns whether the attribute was marked as enum
     *
     * @param $key
     *
     * @return bool
     */
    protected function isEnumAttribute($key)
    {
        return isset($this->enums[$key]);
    }

    protected function addEnumAttributesToArray(array $attributes): array
    {
        foreach ($this->enums as $key => $value) {
            // Don't set if the field is not present (pluck or not selecting them in the SQL can cause it)
            if (isset($this->attributes[$key])) {
                $attributes[$key] = $this->getAttributeValue($key)->value();
            }
        }

        return $attributes;
    }

    /**
     * Returns the enum class. Supports 'FQCN\Class@method()' notation
     *
     * @param $key
     *
     * @return mixed
     */
    private function getEnumClass($key)
    {
        $result = $this->enums[$key];
        if (strpos($result, '@')) {
            $class  = Str::before($result, '@');
            $method = Str::after($result, '@');

            // If no namespace was set, prepend the Model's namespace to the
            // class that resolves the enum class. Prevent this behavior,
            // by setting the resolver class with a leading backslash
            if (class_basename($class) == $class) {
                $class =
                    Str::replaceLast(
                        class_basename(get_class($this)),
                        $class,
                        self::class
                    );
            }

            $result = $class::$method();
        }

        return $result;
    }
}
