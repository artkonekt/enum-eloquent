<?php
/**
 * Contains the AddressType class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-16
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Konekt\Enum\Enum;

class AddressType extends Enum
{
    const BILLING  = 'billing';
    const SHIPPING = 'shipping';
}
