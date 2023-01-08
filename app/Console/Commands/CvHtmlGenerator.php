<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class CvHtmlGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cv:html';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate cv as html';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cv = \view('cv')->render();
        $disk = \Storage::disk('build');
        $disk->put('it/index.html', $cv);
        return Command::SUCCESS;
    }
}
