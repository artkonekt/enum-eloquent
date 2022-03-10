<?php

declare(strict_types=1);

/**
 * Contains the Client model class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-06
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * @property int $id
 * @property BillingRule $billing_rule
 *
 * @method static Client create(array $attributes)
 */
class Client extends Model
{
    use CastsEnums;

    protected $guarded = ['id'];

    protected array $enums = [
        'billing_rule' => BillingRule::class,
    ];
}
