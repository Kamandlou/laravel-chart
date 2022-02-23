<?php

namespace Kamandlou\LaravelChart;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Kamandlou\LaravelChart\Commands\InstallCommand;
use Kamandlou\LaravelChart\Providers\ConsoleServiceProvider;
use Kamandlou\LaravelChart\Support\Chart;
use Kamandlou\LaravelChart\Support\Facades\ChartFacade;

class LaravelChartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePublishing();
        $this->configureCommands();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'chart.php', 'laravel-chart.config'
        );

        $this->configureFacade();
    }

    private function configureFacade()
    {
        AliasLoader::getInstance()->alias('Chart', ChartFacade::class);

        $this->app->bind('chart', function ($app) {
            return new Chart;
        });
    }

    private function configurePublishing()
    {
        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'chart.php' => config_path('chart.php'),
        ], 'laravel-chart.config');

        $this->publishes([
            __DIR__ . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'chart.js' => public_path('js/chart.js')
        ], 'laravel-chart.js');
    }

    private function configureCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
        }
    }

}









