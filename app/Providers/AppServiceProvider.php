<?php

namespace App\Providers;

use App\Models\Electronics;
use App\Models\Brand;
use App\Models\Product_Electronics;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Share data to all views
        $elect_product = Product_Electronics::with('getElectronicsRelation')->distinct()->pluck('electronic_id');
        $elect_categories = Electronics::where('display','=',1)->whereIn('id', $elect_product)->orderBy('order_item')->get();
        View::share('elect_categories', $elect_categories);

        $brands = Brand::with('getSectionRelation')->where('display','=',1)->orderBy("order_item")->get();
        View::share('brands', $brands);
        // Share data to selected views using view composer

        // View::composer(['','home','products.*','blog-news'], function($view){
        //     $view->with('elect_categories', $elect_categories)
        // });

        
    }
}
