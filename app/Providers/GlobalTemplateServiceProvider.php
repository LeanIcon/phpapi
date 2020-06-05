<?php

namespace App\Providers;

use App\Models\Location;
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

        view()->composer(['admin.pages.register.wholesaler', 'auth.login'], function($view){
            $view->with('locations', $this->getLocations());
            // in_array()
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

    public function getLocations()
    {
        // $retailers = $this->users->isRetailer()->get();
        $locations = Location::all();
        return $locations;
    }
}
