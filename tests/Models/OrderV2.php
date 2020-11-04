<?php
/**
 * Contains the Order model class for Enum version 2 default.
 *
 * @copyright   Copyright (c) 2019 Mark Boessenkool
 * @author      Mark Boessenkool
 * @license     MIT
 * @since       2019-09-03
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class OrderV2 extends Model
{
    use CastsEnums;

    protected $table = 'orders';

    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected $enums = [
        'status' => OrderStatusV2::class
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
