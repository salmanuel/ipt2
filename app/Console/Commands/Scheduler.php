<?php

namespace App\Console\Commands;

use App\Events\UserLog;
use App\Models\Fruit;
use Illuminate\Console\Command;

class Scheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scheduler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to schedule';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fruitsToRestock = Fruit::where('restock', true)->get();

        foreach ($fruitsToRestock as $fruit) {
            $fruit->stocks += rand(1, 99);

            $fruit->restock = false;

            // Save the updated fruit
            $fruit->save();

            // Log or output the restocked fruit information
            $this->info("Restocked: {$fruit->fruit_name} (ID: {$fruit->id})");

            $log_entry = "Restocked " . $fruit->fruit_name . " with the ID# of " . $fruit->id;
            event(new UserLog($log_entry));
        }

        $this->info('Restocking completed.');
    }
}
