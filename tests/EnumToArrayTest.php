<?php
/**
 * Contains the EnumAccessorTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-05
 *
 */

namespace Konekt\Enum\Eloquent\Tests;

use Konekt\Enum\Eloquent\Tests\Models\Order;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatusV2;
use Konekt\Enum\Eloquent\Tests\Models\OrderV2;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatus;

class EnumToArrayTest extends TestCase
{
    use DetectsEnumVersion;

    /**
     * @test
     */
    public function returns_enum_string_value()
    {
        $order = new Order([
            'number' => 'abc123',
            'status' => OrderStatus::SUBMITTED
        ]);

        $array = $order->attributesToArray();

        $this->assertArrayHasKey('status', $array);
        $this->assertIsString($array['status']);
    }

    /**
     * @test
     */
    public function still_returns_other_attributes()
    {
        $order = new Order([
            'number' => 'abc123',
            'status' => OrderStatus::SUBMITTED
        ]);

        $array = $order->attributesToArray();

        $this->assertArrayHasKey('number', $array);
        $this->assertEquals($array['number'], $order->number);
    }

    /**
     * @test
     */
    public function to_array_still_works()
    {
        $order = new Order([
            'number' => 'abc123',
            'status' => OrderStatus::SUBMITTED
        ]);

        $attributesArray = $order->attributesToArray();
        $array           = $order->toArray();

        $this->assertEquals($array, $attributesArray);
    }

    /**
     * @test
     */
    public function returns_enum_default_string_value_when_attribute_is_null()
    {
        // don't test if major version is lower than 3
        if ($this->getEnumVersionMajor() < 3) {
            $this->assertTrue(true);

            return;
        }

        $order = new Order([
            'number' => 'abc123',
            'status' => null
        ]);

        $array = $order->attributesToArray();

        $this->assertArrayHasKey('status', $array);
        $this->assertIsString($array['status']);
        $this->assertEquals($array['status'], OrderStatus::__DEFAULT);
    }

    /** @test */
    public function it_does_not_set_the_attribute_key_if_the_attribute_is_absent_in_the_model()
    {
        $order = new Order([
            'number' => 'abc123'
        ]);

        $array = $order->attributesToArray();
        $this->assertArrayNotHasKey('status', $array);
    }

    /**
     * @test
     */
    public function returns_enum_v2_default_string_value_when_attribute_is_null()
    {
        // don't test if major version is 3 or higher
        if ($this->getEnumVersionMajor() >= 3) {
            $this->assertTrue(true);

            return;
        }

        $order = new OrderV2([
            'number' => 'abc123',
            'status' => null
        ]);

        $array = $order->attributesToArray();

        $this->assertArrayHasKey('status', $array);
        $this->assertIsString($array['status']);
        $this->assertEquals($array['status'], OrderStatusV2::__default);
    }
}
