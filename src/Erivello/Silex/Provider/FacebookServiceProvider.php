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
        $app->before(function() use ($app) {
            foreach ($app['facebook.apps'] as $label => $facebookApp) {

                $app['facebook_' . $label] = $app->share(function() use ($facebookApp) {
                    return new \Facebook(array(
                        'appId' => $facebookApp['facebook.app_id'],
                        'secret' => $facebookApp['facebook.secret'],
                    ));
                });

            }
        });
    }
    
    /**
     * @{inheritDoc}
     */
    public function boot(Application $app)
    {
        
    }    
}
