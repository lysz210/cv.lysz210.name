<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class CvPdfGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cv:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate cv';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        availableLocales()->each(function ($locale) {
            $this->generateCv($locale);
        });
        return Command::SUCCESS;
    }

    private function generateCv(String $locale) {
        App::setLocale($locale);
        \PDF::loadView('cv', ['isPdf' => true, 'withMail' => true])
            ->save(base_path("build/$locale/CV_lingyong_sun.pdf"), true);
    }
}
