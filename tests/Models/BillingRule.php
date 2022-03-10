<?php

declare(strict_types=1);

/**
 * Contains the BillingRule class.
 *
 * @copyright   Copyright (c) 2022 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2022-03-10
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Konekt\Enum\Enum;

class BillingRule extends Enum
{
    public const __DEFAULT = self::ANY;
    public const ANY = null;
    public const INVOICE_ONLY = 1;
    public const NO_INVOICE = 0;
}
