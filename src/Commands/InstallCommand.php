<?php

namespace Kamandlou\LaravelChart\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chart:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->withProgressBar([
            [
                'command' => 'vendor:publish',
                'parameters' => [
                    '--tag' => 'laravel-chart.config'
                ]
            ],
            [
                'command' => 'vendor:publish',
                'parameters' => [
                    '--tag' => 'laravel-chart.js'
                ]
            ]
        ], function ($command) {
            Artisan::call($command['command'], $command['parameters']);
        });
    }
}
