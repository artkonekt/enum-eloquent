<?php
/**
 * Contains the AddressStatusResolver class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-16
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

class AddressStatusResolver
{
    /**
     * Returns the enum class to use as address type enum
     *
     * @return string
     */
    public static function enumClass()
    {
        return AddressStatus::class;
    }
}
