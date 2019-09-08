<?php
/**
 * Contains the EloquentType enum class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-24
 *
 */

namespace Konekt\Enum\Eloquent\Tests\Models;

use Konekt\Enum\Enum;

class EloquentType extends Enum
{
    const NADA      = null;
    const WHATEVER  = 'whatever';
    const NEVERMIND = 'nevermind';
}
