# ZOOP Laravel

Zoop-laravel is a package for **Laravel 5.3+**, which consumes ZOOP payments api's.
> Statistics  
[![Latest Stable Version](https://poser.pugx.org/adhenrique/zoop/version)](https://packagist.org/packages/adhenrique/zoop)
[![Total Downloads](https://poser.pugx.org/adhenrique/zoop/downloads)](https://packagist.org/packages/adhenrique/zoop)
[![Latest Unstable Version](https://poser.pugx.org/adhenrique/zoop/v/unstable)](//packagist.org/packages/adhenrique/zoop)
[![License](https://poser.pugx.org/adhenrique/zoop/license)](https://packagist.org/packages/adhenrique/zoop)

## Requeriments

* Laravel 5.3+
* PHP 5.6+
* PHP ext-curl
* PHP ext-json
* PHP ext-mbstring


## Instalation
### 1 - Composer require
Use composer to install the package and automatically update `composer.json`, running:

~~~
composer require adhenrique/zoop
~~~

### 2 - Update Laravel configuration
Update your application configuration to register the package in `config/app.php` adding the following line in `'providers'` section:

~~~
'providers' => [
    //...
    Zoop\ZoopServiceProvider::class,
    //...
],
~~~

### 3 - Update ZOOP Laravel configuration
Rename config.example.php to config.php in `zoop/src/resources/config/` and change the following lines:

~~~
'defaults'  => [
    //...
    'publishable_key'   => 'YOUR_PUBLISHABLE_KEY',
    'marketplace_id'    => 'YOUR_MARKETPLACE_ID',
    //...
]
~~~

...enjoy it :D.

## Usage
### 1 - Tokenizer Credit Card
**In your Controller**
```php
namespace App\Http\Controllers;
 
use Zoop\src\Facades\ZoopTokens;
 
class HomeController extends Controller{
    $ccToken = ZoopTokens::tokenizeCard([
        'holder_name' => 'Makeda Swasey',
        'expiration_month' => "12",
        'expiration_year' => "2015",
        'security_code' => "373",
        'card_number' => "4532395075641483",
    ]);
    
    dd($ccToken);
}
```

### 2 - Creating a new Individual Seller
**In your Controller**
```php
namespace App\Http\Controllers;
 
use Zoop\src\Facades\ZoopSellers;
 
class HomeController extends Controller{
    $individualSeller = ZoopSellers::create([
        'first_name' => 'Rodrigo',
        'last_name' => "Miranda",
        'email' => "rodrigo@pagzoop.com",
        'phone_number' => "+12195465432",
        'ssn_last4_digits' => "7551",
        'birthdate' => "1983-09-11",
        'website' => "http://pagzoop.com",
        'facebook' => "https://www.facebook.com/rodrigo",
        'twitter' => "http://twitter.com/hypercreative",
    ]);
    
    dd($individualSeller);
}
```

### 3 - Creating a new Buyer
**In your Controller**
```php
namespace App\Http\Controllers;
 
use Zoop\src\Facades\ZoopBuyers;
 
class HomeController extends Controller{
    $buyer = ZoopBuyers::create([
        'first_name' => 'Fabiano',
        'last_name' => 'Cruz',
        'description' => 'Comprador de teste',
        'email' => 'fabiano@example.com',
    ]);
    
    dd($buyer);
}
```

### 4 - Card Not Present Transaction
**In your Controller**
```php
namespace App\Http\Controllers;
 
use Zoop\src\Facades\ZoopChargeCNP;
 
class HomeController extends Controller{
    $cnp = ZoopChargesCNP::create([
        'currency' => 'BRL',
        'amount' => '100',
        'payment_type' => 'credit',
        'description' => 'Venda de teste, somente!',
        'statement_descriptor' => 'Descrição de testes',
        'on_behalf_of' => 'bb2a51f1c22a4c30b6bf6819be87ac52',
        'installment_plan[mode]' => 'interest_free',
        'installment_plan[number_installments]' => '1',
        'customer' => 'bb2a51f1c22a4c30b6bf6819be87ac52', //buyer ud
    ]);
    
    dd($cnp);
}
```

## ZOOP Api Reference

[https://pagzoop.com/api/docs/](https://pagzoop.com/api/docs/)