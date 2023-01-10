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
        availableLocales()->each(function ($locale) {

            dump($locale);
            $this->generateHtml($locale);
        });
        return Command::SUCCESS;
    }

    private function generateHtml(String $locale) {
        App::setLocale($locale);
        $cv = view('cv', ['withMail' => true])
            ->toHtml();
        $disk = Storage::disk('project');
        $disk->put("build/$locale/index.html", $cv);
    }
}
