<?php
/**
 * Contains the Squirrel class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-24
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * This is a 'weird' model class in order to test against unwanted match with
 * class name that exists in namespace as well
 */
class Eloquent extends Model
{
    use CastsEnums;

    protected $enums = [
        'type' => 'EloquentTypeProxy@enumClass'
    ];
}
