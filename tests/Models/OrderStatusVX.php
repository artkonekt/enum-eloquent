<?php

declare(strict_types=1);

/**
 * Contains the OrderStatus class with Enum version 2 and 3 default.
 *
 * @copyright   Copyright (c) 2019 Mark Boessenkool
 * @author      Mark Boessenkool
 * @license     MIT
 * @since       2019-09-03
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Konekt\Enum\Enum;

class OrderStatusVX extends Enum
{
    public const __DEFAULT = self::SUBMITTED;
    public const __default = self::SUBMITTED; // v2 default for backwards compatibility

    public const SUBMITTED = 'submitted';
    public const PROCESSING = 'processing';
    public const SHIPPING = 'shipping';
    public const COMPLETED = 'completed';
}
