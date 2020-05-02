<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class GlobalTemplateServiceProvider extends ServiceProvider
{
    public $users;
    public function __construct()
    {
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin.layouts.topbar'], function($view){
            $view->with('wholesalers', $this->getWholeslers());
        });

        view()->composer(['admin.layouts.topbar'], function($view){
            $view->with('retailers', $this->getRetailers());
        });

        view()->composer([], function($view){
            
        });
    }

    public function getWholeslers()
    {
        // $wholesalers = $this->users->isWholeSaler()->get();
        $wholesalers = User::where('type', 'wholesaler')->get();
        return $wholesalers;
    }

    public function getRetailers()
    {
        // $retailers = $this->users->isRetailer()->get();
        $retailers = User::where('type', 'retailer')->get();;
        return $retailers;
    }
}
