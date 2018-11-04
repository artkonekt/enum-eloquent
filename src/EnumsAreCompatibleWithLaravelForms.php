<?php
/**
 * Contains the EnumsAreCompatibleWithLaravelForms trait.
 *
 * @copyright   Copyright (c) 2018 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-11-04
 *
 */

namespace Konekt\Enum\Eloquent;

trait EnumsAreCompatibleWithLaravelForms
{
    public function getFormValue(string $key)
    {
        if ($this->isEnumAttribute($key)) {
            return $this->{$key}->value();
        }

        return $this->{$key};
    }
}
