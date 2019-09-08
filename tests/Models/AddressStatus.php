<?php
/**
 * Contains the AddressStatus class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-16
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Konekt\Enum\Enum;

class AddressStatus extends Enum
{
    const UNKNOWN   = null;
    const VALID     = 'valid';
    const INVALID   = 'invalid';
}
