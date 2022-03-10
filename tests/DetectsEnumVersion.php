<?php

declare(strict_types=1);

/**
 * Contains the DetectsEnumVersion trait.
 *
 * @copyright   Copyright (c) 2020 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2020-11-04
 *
 */

namespace Konekt\Enum\Eloquent\Tests;

use Konekt\Enum\Enum;

trait DetectsEnumVersion
{
    private function getEnumVersion(): string
    {
        if (method_exists(Enum::class, 'hasNot')) {
            return '4.0.0';
        }

        return defined(Enum::class . '::__DEFAULT') ? '3.0.0' : '2.3.0';
    }

    private function getEnumVersionMajor(): int
    {
        $parts = explode('.', $this->getEnumVersion());

        return (int) $parts[0];
    }
}
