<?php
/**
 * Contains the DynamicClassResolverTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-16
 *
 */

namespace Konekt\Enum\Eloquent\Tests;

use Konekt\Enum\Eloquent\Tests\Models\Address;
use Konekt\Enum\Eloquent\Tests\Models\AddressStatus;
use Konekt\Enum\Eloquent\Tests\Models\AddressType;
use Konekt\Enum\Eloquent\Tests\Models\Eloquent;
use Konekt\Enum\Eloquent\Tests\Models\EloquentType;
use Konekt\Enum\Eloquent\Tests\Models\Extended\Address as ExtendedAddress;

class DynamicClassResolverTest extends TestCase
{
    /**
     * @test
     */
    public function it_resolves_fqcn_enum_class_name_from_the_at_notation()
    {
        $address = Address::create([
            'type'    => AddressType::SHIPPING,
            'address' => 'Richard Avenue 33'
        ]);

        $this->assertInstanceOf(AddressType::class, $address->type);
    }

    /**
     * @test
     */
    public function it_resolves_local_enum_class_name_from_the_at_notation()
    {
        $address = Address::create([
            'type'    => AddressType::SHIPPING,
            'address' => 'Richard Avenue 33'
        ]);

        $this->assertInstanceOf(AddressStatus::class, $address->status);
    }

    /**
     * @test
     */
    public function at_notation_does_not_collide_if_class_name_is_in_nampespace()
    {
        $eloquent = Eloquent::create([]);

        $this->assertInstanceOf(EloquentType::class, $eloquent->type);
    }

    /**
     * @test
     */
    public function it_keeps_original_namespace_with_at_notation_when_using_short_classnames_in_extended_classes()
    {
        $address = ExtendedAddress::create([
            'type'    => AddressType::BILLING,
            'address' => 'Alexander Platz 1.'
        ]);

        $this->assertInstanceOf(AddressStatus::class, $address->status);
    }
}
