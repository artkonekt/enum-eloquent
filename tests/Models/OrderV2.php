<?php
/**
 * Contains the Order model class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-05
 *
 */


namespace Konekt\Enum\Eloquent\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class OrderV2 extends Model
{
    use CastsEnums;

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
