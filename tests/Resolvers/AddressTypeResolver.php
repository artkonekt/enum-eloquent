<?php
/**
 * Contains the AddressTypeResolver class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-16
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Resolvers;

use Konekt\Enum\Eloquent\Tests\Models\AddressType;

class AddressTypeResolver
{
    /**
     * Returns the enum class to use as address type enum
     *
     * @return string
     */
    public static function enumClass()
    {
        return AddressType::class;
    }
}
