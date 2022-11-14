# Laravel SMS Pro

Laravel SMS Pro allows you to send SMS from your Laravel application using multiple bulk sms service provider's api.
Note: Now Only SMSQ Provider Availble. (Othrs Are Comming Soon)


## Requirements
- PHP >=8.1

## Installation

### Step 1
You can install the package via composer:
```shell
composer require tomal2000/laravel-sms-pro
```
#### Laravel 5.5 and above
The package will automatically register itself, so you can start using it immediately.
#### Laravel 5.4 and older
In Laravel version 5.4 and older, you have to add the service provider in `config/app.php` file manually:
```php
'providers' => [
    // ...
    Tomal2000\LaravelSmsPro\LaravelSmsProServiceProvider::class,
];
```
#### Lumen
After installing the package, you will have to register it in `bootstrap/app.php` file manually:
```php
// Register Service Providers
    // ...
    $app->register(Tomal2000\LaravelSmsPro\LaravelSmsProServiceProvider::class);
];
```
#### Env Keys
```dotenv
SMS_SENDER=
SMSQ_APIKEY=
SMSQ_CLINTID=
```
### Step 2 - Publishing files
Run:
`php artisan vendor:publish --tag=laravel-sms-pro`
This will move the migration file, seeder file and config file to your app. You can set your sms details in the config file or via env

### Step 3 - Adding SMS credentials
- Add the env keys to your `.env` file
- Or edit the config/laravel-sms.php file

## Usage
```php
//using SMSQ Provider
use use Tomal2000\LaravelSmsPro\Concrete\SMSQ;

sms = new SMSQ();

$sms->text('This Laravel Test Message')->to('8801307366733')->from('MyLaravel')->send(); //return true/false for success/failed

//to('880130736673','8801736744457') use like this if you want to sent message to multiple numbers. Country Code is Mandatory
//from(string 'MyLaravel') Thsi Optional If Not set it then got Sender Id Form SMS_SENDER env key from .env or laravel-sms-pro.php file.

$sms->getResponse(); //also you can get response payload using this

$sms->getException(); //also you can get exception if error occured using this,exceptions will be logged in your laravel log file
```

### Available SMS Providers
|Provider|URL|Tested|
|:--------- | :-----------------: | :------: |
|SMSQ|https://api.smsq.global/swagger/index.html|Yes|

## Contributing
- Fork this project
- Clone to your repo
- Clone your forked repo
- Make your changes and test
- Push and create Pull request
- Push and create Pull Request
- Make sure your PR passes all checks
