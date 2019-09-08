<?php
/**
 * Contains the Address class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-16
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class Address extends Model
{
    use CastsEnums;

    protected $guarded = ['id'];

    protected $enums = [
        'type'   => 'Konekt\\Enum\\Eloquent\\Tests\\Resolvers\\AddressTypeResolver@enumClass',
        'status' => 'AddressStatusResolver@enumClass'
    ];
}
