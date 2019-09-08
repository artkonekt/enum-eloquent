<?php
/**
 * Contains the EloquentTypeProxy class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-24
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

class EloquentTypeProxy
{
    public static function enumClass()
    {
        return EloquentType::class;
    }
}
