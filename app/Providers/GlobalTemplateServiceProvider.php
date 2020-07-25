<?php

namespace App\Providers;

use App\User;
use App\Models\Region;
use App\Models\Location;
use App\PostAdvert;
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

        view()->composer(['admin.pages.register.wholesaler', 'auth.login'], function($view){
            $view->with('regions', $this->getRegions());
            // in_array()
        });
        view()->composer(['admin.pages.retailers.wholesalers'], function($view){
            $view->with('postadvert', $this->getAdvert());
        });
        view()->composer(['admin.pages.retailers.dashboard'], function($view){
            $view->with('postadvert', $this->getAdvert());
        });
        view()->composer(['admin.pages.retailers.wholesaler_details'], function($view){
            $view->with('postadvert', $this->getAdvert());
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

    public function getRegions()
    {
        $regions=Region::all();
        return $regions;
    }
    public function getAdvert()
    {
        $pageTitle = 'Adverts';
        $postadvert = PostAdvert::all();
        return $postadvert;
    }

}
