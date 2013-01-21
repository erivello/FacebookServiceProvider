FacebookServiceProvider
=======================

A Facebook Service Provider for [Silex][1].

[![Build Status](https://secure.travis-ci.org/erivello/FacebookServiceProvider.png?branch=master)](http://travis-ci.org/erivello/FacebookServiceProvider)

Installation
------------

Installation is very easy, it makes use of [Composer][2].

### Install Composer

Run this in your command line:

``` bash
$ curl -s http://getcomposer.org/installer | php
```

Or [download composer.phar][3] into the project root.

### Add FacebookServiceProvider to your composer.json

    "require": {
        "php": "> 5.3.3",
        "erivello/facebook-service-provider": "dev-master"
    }

### Install Dependencies

Run the following command:

``` bash
$ php composer.phar install
```

Now FacebookServiceProvider is installed into your vendor directory.

Registering
-----------

    $app->register(new Erivello\Silex\FacebookServiceProvider(), array(
        'facebook.apps' => array(
            'application one' => array(
                'facebook.app_id'     => '12345',
                'facebook.secret'     => '67890'
            ),
            'application two' => array(
                'facebook.app_id'     => '54321',
                'facebook.secret'     => '09876'
            ),
        )
    ));


Usage
--------

You can access the FacebookServiceProvider by calling ``$app['facebook']``.


Tests
-----

``` bash
$ php composer.phar install && phpunit
```

License
-------

The FacebookServiceProvider is licensed under the MIT license.

[1]: http://silex.sensiolabs.org/
[2]: http://getcomposer.org/
[3]: http://getcomposer.org/composer.phar
