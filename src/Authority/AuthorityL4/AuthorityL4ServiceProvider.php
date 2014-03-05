<?php
namespace Authority\AuthorityL4;

use Authority\Authority;
use Illuminate\Support\ServiceProvider;

class AuthorityL4ServiceProvider extends ServiceProvider
{
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){
        $this->package('machuga/authority-l4');

        $this->app['authority'] = $this->app->share(function($app){
            $user = $app['auth']->user();
            $authority = new Authority($user);
            $fn = $app['config']->get('authority-l4::initialize', null);

            if($fn) {
                $fn($authority);
            }

            return $authority;
        });
        
        $this->app->alias('authority', 'Authority\Authority');
    }

}
