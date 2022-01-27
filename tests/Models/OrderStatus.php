<?php

declare(strict_types=1);

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
    public const __DEFAULT = self::SUBMITTED;

    public const SUBMITTED = 'submitted';
    public const PROCESSING = 'processing';
    public const SHIPPING = 'shipping';
    public const COMPLETED = 'completed';
}
