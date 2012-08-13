<?php

/*
 * This file is part of FacebookServiceProvider.
 *
 * (c) Edoardo Rivello <edoardo.rivello@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Erivello\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Facebook Provider
 *
 * @author Edoardo Rivello <edoardo.rivello@gmail.com>
 */
class FacebookServiceProvider implements ServiceProviderInterface
{
    /**
     * @{inheritDoc}
     */
    public function register(Application $app)
    {
        $app['facebook'] = $app->share(function() use ($app) {

            $facebook = new \Facebook(array(
                'appId' => $app['facebook.app_id'],
                'secret' => $app['facebook.secret'],
            ));

            return $facebook;
        });
    }
    
    /**
     * @{inheritDoc}
     */
    public function boot(Application $app)
    {
        
    }    
}
