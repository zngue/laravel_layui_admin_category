<?php


namespace Zngue\Category\Provider;


use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/../../routes/web.php");
        $this->loadViewsFrom(__DIR__ . '/../../views', 'zng');
        if ($this->app->runningInConsole()) {
            $this->commands([
                //serCommands::class
            ]);
        }
    }

}
