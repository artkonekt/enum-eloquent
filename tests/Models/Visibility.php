<?php

declare(strict_types=1);

/**
 * Contains the Order model class for Enum version 2 and 3 default.
 *
 * @copyright   Copyright (c) 2023 Mark Boessenkool
 * @author      Mark Boessenkool
 * @license     MIT
 * @since       2023-08-02
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class Visibility extends Model
{
    use CastsEnums;

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected $enums = [
        'talk1' => VisibilityTalk::class,
        'talk2' => VisibilityTalk::class,
    ];

    protected $hidden = [
        'talk1',
    ];
}
