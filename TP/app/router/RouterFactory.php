<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory {

    use Nette\StaticClass;

    /**
     * @return Nette\Application\IRouter
     */
    public static function createRouter() {
        $router = new RouteList;

        // predvoleny bude presenter Profil a akce default
        $router[] = new Route('<presenter>/<action>/', 'Profil:default');

        $router[] = new Route('<action>/', array(
            'presenter' => 'Sign',
            'action' => array(
                // retazec v URL => akcia presenteru
                Route::FILTER_TABLE => array(
                    'login' => 'login',
                    // 'default' => 'default',                                       
                    'logout' => 'logout',
                    'register' => 'register'
                ),
                Route::FILTER_STRICT => true
            )
        ));
        $router[] = new Route('<presenter>/<action>/', array(
            'presenter' => 'Place',
            'action' => array(
                Route::FILTER_TABLE => array(
                    'default' => 'default',
                    'cbc' => 'cbc',
                    'tesla' => 'tesla',
                ),
                Route::FILTER_STRICT => true
            )
        ));


        $router[] = new Route('<presenter>/<action>/', array(
            'presenter' => 'Facility',
            'action' => array(
                Route::FILTER_TABLE => array(
                    'default' => 'default',
                    'add' => 'add',
                    'existing' => 'existing',
                    'new' => 'new',
                    'edit' => 'edit'
                ),
                Route::FILTER_STRICT => true
            )
        ));
        return $router;
    }

}
