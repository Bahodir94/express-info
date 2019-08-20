<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 21:55
 */

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
        'App\Repositories\CguCategoryRepositoryInterface',
        'App\Repositories\CguCategoryRepository'
        );
        $this->app->bind(
        'App\Repositories\CguSiteRepositoryInterface',
        'App\Repositories\CguSiteRepository'
        );
    }
}