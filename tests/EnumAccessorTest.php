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

use Konekt\Enum\Eloquent\Tests\Models\Client;
use Konekt\Enum\Eloquent\Tests\Models\Order;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatus;

class EnumAccessorTest extends TestCase
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
    public function it_returns_the_enum_default_when_attribute_is_null()
    {
        $order = new Order([
            'number' => 'PLGU7S5'
        ]);

        $this->assertInstanceOf(OrderStatus::class, $order->status);
        $this->assertEquals(OrderStatus::__default, $order->status->value());
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
            'number'    => 'KH8FRWAD',
            'status'    => OrderStatus::PROCESSING,
            'is_active' => 1
        ]);

        $this->assertNotNull($order->id);
        $this->assertInstanceOf(\DateTime::class, $order->created_at);
        $this->assertInternalType('boolean', $order->is_active);
    }

    /**
     * @test
     */
    public function it_doesnt_break_related_properties()
    {
        $client = Client::create(['name' => 'Britney Spears']);

        $order = Order::create([
            'number'    => 'LDYG4G4',
            'status'    => OrderStatus::PROCESSING,
            'client_id' => $client->id
        ]);

        $this->assertInstanceOf(Client::class, $order->client);
        $this->assertEquals($client->id, $order->client->id);
    }
}
