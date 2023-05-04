<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testing extends Command
{
    public const KB = 1024;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mem1 = memory_get_peak_usage(true);

        $models = [];
        for ($i = 0; $i < 10000; $i++) {
            $models[] = new \App\Models\Test(['name' => "rand_$i", 'age' => $i]);
        }
        $mem2 = memory_get_peak_usage(true);

        $this->info(sprintf('MEM at start: %d', $mem1 / static::KB));
        $this->info(sprintf('MEM at final: %d', $mem2 / static::KB));
        $this->info(sprintf('MEM delta: %d', ($mem2 - $mem1) / static::KB));
        $this->info('The command was successful!');
    }
}
