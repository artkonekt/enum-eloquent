<?php
/**
 * Contains the EnumMutatorTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-05
 *
 */

namespace Konekt\Enum\Eloquent\Tests;

use Konekt\Enum\Eloquent\Tests\Models\Order;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatus;

class EnumMutatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_accepts_enum_object_when_setting_value()
    {
        $order = Order::create([
            'number' => 'NMLM1HQ',
            'status' => OrderStatus::SUBMITTED
        ]);

        $this->assertTrue($order->status->equals(OrderStatus::SUBMITTED()));

        $order->status = OrderStatus::PROCESSING();
        $order->save();

        $this->assertTrue($order->status->equals(OrderStatus::PROCESSING()));
    }

    /**
     * @test
     */
    public function it_accepts_enums_primitive_value_as_well_when_setting_value()
    {
        $order = Order::create([
            'number' => 'TFOD578',
            'status' => OrderStatus::SUBMITTED
        ]);

        $order->status = OrderStatus::PROCESSING;
        $order->save();

        $this->assertTrue($order->status->equals(OrderStatus::PROCESSING()));
    }

    /**
     * @test
     */
    public function it_accepts_enum_object_on_mass_assignment()
    {
        $order = Order::create([
            'number' => 'MIAAVC7',
            'status' => OrderStatus::PROCESSING()
        ]);

        $this->assertTrue($order->status->equals(OrderStatus::PROCESSING()));

        $order->update(['status' => OrderStatus::SHIPPING()]);

        $this->assertTrue($order->status->equals(OrderStatus::SHIPPING()));
    }

    /**
     * @test
     */
    public function it_doesnt_accept_scalars_that_arent_valid_enum_values()
    {
        $this->expectException(\UnexpectedValueException::class);
        $order         = new Order();
        $order->status = 'wtf';
    }
}
