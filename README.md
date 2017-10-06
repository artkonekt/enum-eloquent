# Konekt Enum Eloquent Bindings


[![Build Status](https://travis-ci.org/artkonekt/enum-eloquent.png?branch=master)](https://travis-ci.org/artkonekt/enum-eloquent)
[![Latest Stable Version](https://poser.pugx.org/konekt/enum-eloquent/version.png)](https://packagist.org/packages/konekt/enum-eloquent)
[![Total Downloads](https://poser.pugx.org/konekt/enum-eloquent/downloads.png)](https://packagist.org/packages/konekt/enum-eloquent)
[![Open Source Love](https://badges.frapsoft.com/os/mit/mit.svg?v=102)](https://github.com/ellerbrock/open-source-badge/)

This package provides support for auto casting [konekt enum](https://github.com/artkonekt/enum) fields in [Eloquent models](https://laravel.com/docs/5.4/eloquent-mutators).

> Supported Konekt Enum versions are 2.0+ and Eloquent 5.0+

## Installation

`composer require konekt/enum-eloquent`

## Usage

1. Add the `CastsEnums` trait to your model
2. Define the attributes to be casted via the `protected $enums` property on the model

### Example

**The Enum:**

```php
namespace App;

use Konekt\Enum\Enum;

class OrderStatus extends Enum
{
    const __default = self::PENDING;

    const PENDING   = 'pending';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';

}
```

**The Model:**

```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Konekt\Enum\Eloquent\CastsEnums;

class Order extends Model
{
    use CastsEnums;

    protected $enums = [
        'status' => OrderStatus::class
    ];
}
```

**Client code:**
```php
$order = Order::create([
    'status' => 'pending'
]);

// The status attribute will be an enum object:
echo get_class($order->status);
// output: App\OrderStatus

echo $order->status->value();
// output: 'pending'

echo $order->status->equals(OrderStatus::PENDING()) ? 'yes' : 'no';
// output: yes

echo $order->status->equals(OrderStatus::CANCELLED()) ? 'yes' : 'no';
// output: no

// You can assign an enum object as attribute value:
$order->status = OrderStatus::COMPLETED();
echo $order->status->value();
// output: 'completed'

// It also works with mass assignment:
$order = Order::create([
    'status' => OrderStatus::COMPLETED()    
]);

echo $order->status->value();
// output 'completed'

// It still accepts scalar values:
$order->status = 'completed';
echo $order->status->equals(OrderStatus::COMPLETED()) ? 'yes' : 'no';
// output: yes

// But it doesn't accept scalar values that aren't in the enum:
$order->status = 'negotiating';
// throws UnexpectedValueException
// Given value (negotiating) is not in enum `App\OrderStatus`
```

Enjoy!

For detailed usage of konekt enums refer to [its readme](https://github.com/artkonekt/enum).
