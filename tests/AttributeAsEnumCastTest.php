<?php
/**
 * Contains the AttributeAsEnumCastTest class.
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

class AttributeAsEnumCastTest extends TestCase
{

    /**
     * @test
     */
    public function it_casts_marked_attributes_to_their_proper_enum_class()
    {
        $order = Order::create([
            'number' => 'SXCJ7WA',
            'status' => OrderStatus::SUBMITTED
        ]);

        $this->assertNotNull($order->id);
        $this->assertInstanceOf(OrderStatus::class, $order->status);
    }

    /**
     * @test
     */
    public function it_can_still_read_basic_properties_as_well()
    {
        $order = Order::create([
            'number' => 'UIH6GQS',
            'status' => OrderStatus::SUBMITTED
        ]);

        $this->assertNotNull($order->id);
        $this->assertEquals('UIH6GQS', $order->number);
    }

    /**
     * @test
     */
    public function it_can_still_read_casted_fields()
    {
        $order = Order::create([
            'number' => 'KH8FRWAD',
            'status' => OrderStatus::PROCESSING
        ]);

        $this->assertNotNull($order->id);
        $this->assertInstanceOf(\DateTime::class, $order->created_at);
        $this->assertInternalType('boolean', $order->is_active);
    }

}