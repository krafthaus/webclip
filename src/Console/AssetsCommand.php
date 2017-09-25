<?php

namespace KraftHaus\WebClip\Console;

use Illuminate\Console\Command;

class AssetsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webclip:assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-publish the WebClip assets';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'webclip-assets',
            '--force' => true,
        ]);
    }
}
