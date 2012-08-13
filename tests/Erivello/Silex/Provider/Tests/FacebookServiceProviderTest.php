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
            'facebook.app_id' => '12345',
            'facebook.secret' => '67890',
        ));
        
        $app->get('/', function() use($app) {
            $app['facebook'];
        });
        $request = Request::create('/');
        $app->handle($request);
        
        $this->assertTrue($app['facebook'] instanceof \Facebook);
        $this->assertEquals($app['facebook']->getAppId(), '12345');
        $this->assertEquals($app['facebook']->getApiSecret(), '67890');
        $this->assertEquals($app['facebook']->getAccessToken(), '12345|67890');
    }
}
