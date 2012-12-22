<?php

namespace Erivello\Silex\Tests;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Erivello\Silex\Provider\FacebookServiceProvider;

class FacebookServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $app = new Application();

        $app->register(new FacebookServiceProvider(), array(
            'facebook.apps' => array(
                'test' => array(
                    'facebook.app_id'     => '12345',
                    'facebook.secret'     => '67890'
                ),
                'foo' => array(
                    'facebook.app_id'     => '54321',
                    'facebook.secret'     => '09876'
                ),
            )
        ));
        
        $app->get('/', function() use($app) {
            $app['facebook_test'];
            $app['facebook_foo'];
        });
        $request = Request::create('/');
        $app->handle($request);

        $this->assertTrue($app['facebook_test'] instanceof \Facebook);
        $this->assertEquals($app['facebook_test']->getAppId(), '12345');
        $this->assertEquals($app['facebook_test']->getApiSecret(), '67890');
        $this->assertEquals($app['facebook_test']->getAccessToken(), '12345|67890');

        $this->assertTrue($app['facebook_foo'] instanceof \Facebook);
        $this->assertEquals($app['facebook_foo']->getAppId(), '54321');
        $this->assertEquals($app['facebook_foo']->getApiSecret(), '09876');
        $this->assertEquals($app['facebook_foo']->getAccessToken(), '54321|09876');
    }
}
