<?php

namespace App\Console\Commands;

use App\Http\Controllers\StatisticsController;
use Illuminate\Console\Command;

class CalculateStaticsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statics {country}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is Statics Custom Command';

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
     * @return int
     */
    public function handle()
    {
        $country = $this->argument('country');
        $controller = new StatisticsController();
        $this->info($controller->dashboard($country));
    }
}
