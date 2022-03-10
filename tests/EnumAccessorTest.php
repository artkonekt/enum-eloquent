<?php

declare(strict_types=1);

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

use Konekt\Enum\Eloquent\Tests\Models\BillingRule;
use Konekt\Enum\Eloquent\Tests\Models\Client;
use Konekt\Enum\Eloquent\Tests\Models\Order;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatus;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatusV2;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatusVX;
use Konekt\Enum\Eloquent\Tests\Models\OrderV2;
use Konekt\Enum\Eloquent\Tests\Models\OrderVX;

class EnumAccessorTest extends TestCase
{
    use DetectsEnumVersion;

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
        // don't test if mayor version is lower than 3
        if ($this->getEnumVersionMajor() < 3) {
            $this->assertTrue(true);

            return;
        }

        $order = new Order([
            'number' => 'PLGU7S5'
        ]);

        $this->assertInstanceOf(OrderStatus::class, $order->status);
        $this->assertEquals(OrderStatus::__DEFAULT, $order->status->value());
    }

    /**
     * @test
     */
    public function it_returns_the_enum_v2_default_when_attribute_is_null()
    {
        // don't test if mayor version is 3 or higher
        if ($this->getEnumVersionMajor() >= 3) {
            $this->assertTrue(true);

            return;
        }

        $order = new OrderV2([
            'number' => 'PLGU7S5'
        ]);

        $this->assertInstanceOf(OrderStatusV2::class, $order->status);
        $this->assertEquals(OrderStatusV2::__default, $order->status->value());
    }

    /**
     * @test
     */
    public function it_returns_the_enum_backwards_compatible_default_when_attribute_is_null()
    {
        $order = new OrderVX([
            'number' => 'PLGU7S5'
        ]);

        $this->assertInstanceOf(OrderStatusVX::class, $order->status);
        $this->assertEquals(OrderStatusVX::__DEFAULT, $order->status->value());
        $this->assertEquals(OrderStatusVX::__default, $order->status->value());
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
            'status' => OrderStatus::PROCESSING,
            'is_active' => 1
        ]);

        $this->assertNotNull($order->id);
        $this->assertInstanceOf(\DateTime::class, $order->created_at);
        $this->assertIsBool($order->is_active);
    }

    /**
     * @test
     */
    public function it_doesnt_break_related_properties()
    {
        $client = Client::create(['name' => 'Britney Spears']);

        $order = Order::create([
            'number' => 'LDYG4G4',
            'status' => OrderStatus::PROCESSING,
            'client_id' => $client->id
        ]);

        $this->assertInstanceOf(Client::class, $order->client);
        $this->assertEquals($client->id, $order->client->id);
    }

    /** @test */
    public function it_works_with_integer_database_fields()
    {
        $clientAny = Client::create(['name' => 'Pawel Jedrzejewsky']);
        $clientInvoiceOnly = Client::create(['name' => 'Pawel Jedrzejewsky', 'billing_rule' => 1]);
        $clientNoInvoice = Client::create(['name' => 'Pawel Jedrzejewsky', 'billing_rule' => 0]);

        $this->assertInstanceOf(BillingRule::class, $clientAny->billing_rule);
        $this->assertNull($clientAny->billing_rule->value());

        $this->assertInstanceOf(BillingRule::class, $clientInvoiceOnly->billing_rule);
        $this->assertEquals(1, $clientInvoiceOnly->billing_rule->value());

        $this->assertInstanceOf(BillingRule::class, $clientNoInvoice->billing_rule);
        $this->assertEquals(0, $clientNoInvoice->billing_rule->value());
    }
}
