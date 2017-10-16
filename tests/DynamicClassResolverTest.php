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

class DynamicClassResolverTest extends TestCase
{
    /**
     * @test
     */
    public function it_resolves_fqcn_enum_class_name_from_the_at_notation()
    {
        $address = Address::create([
            'type' => AddressType::SHIPPING,
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
            'type' => AddressType::SHIPPING,
            'address' => 'Richard Avenue 33'
        ]);

        $this->assertInstanceOf(AddressStatus::class, $address->status);
    }

}
