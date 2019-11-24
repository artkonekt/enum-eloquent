<?php
/**
 * Contains the TestCase class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-10-05
 *
 */

namespace Konekt\Enum\Eloquent\Tests;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Events\Dispatcher;
use Konekt\Enum\Eloquent\Tests\Models\OrderStatus;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $capsule;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    protected function setUpDatabase()
    {
        $this->capsule = new Capsule();
        $this->capsule->addConnection([
            'driver'   => 'sqlite',
            'database' => ':memory:',
        ]);

        $this->capsule->setEventDispatcher(new Dispatcher());
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();

        $this->capsule->schema()->dropIfExists('orders');
        $this->capsule->schema()->dropIfExists('clients');
        $this->capsule->schema()->dropIfExists('addresses');

        $this->capsule->schema()->create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('client_id')->unsigned()->nullable();
            $table->enum('status', OrderStatus::values());
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $this->capsule->schema()->create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $this->capsule->schema()->create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('status')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        $this->capsule->schema()->create('eloquents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }
}
