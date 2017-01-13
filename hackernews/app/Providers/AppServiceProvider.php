<?php

namespace hackernews\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    /*Validator::extend('trim', function ($attribute, $value, $parameters, $validator) {
	    	if(mb_detect_encoding($value)){

		    }else{

		    }
		    return $value == 'foo';
	    });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
