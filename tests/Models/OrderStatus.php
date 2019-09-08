<?php
/**
 * Contains the OrderStatus class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-05
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Konekt\Enum\Enum;

class OrderStatus extends Enum
{
    const __DEFAULT = self::SUBMITTED;

    const SUBMITTED  = 'submitted';
    const PROCESSING = 'processing';
    const SHIPPING   = 'shipping';
    const COMPLETED  = 'completed';
}
