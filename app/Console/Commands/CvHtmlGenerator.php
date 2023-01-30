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
    protected $signature = 'cv:html {locale} {--outputDir=build}';

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
        $locale = $this->argument('locale');
        $outputDir = $this->option('outputDir');
        $disk = Storage::build([
            'driver' => 'local',
            'root' => base_path("$outputDir"),
            'visibility' => 'private',
            'throw' => true,
        ]);

        App::setLocale($this->argument('locale'));
        $cv = view('cv', ['withMail' => false])
            ->toHtml();
        
        $disk->put("$locale/index.html", $cv);
        return Command::SUCCESS;
    }
}
