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
    protected $signature = 'cv:pdf  {locale} {--outputDir=build}';

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
        $locale = $this->argument('locale');
        $outputDir = $this->option('outputDir');
        $disk = Storage::build([
            'driver' => 'local',
            'root' => base_path("$outputDir"),
            'visibility' => 'private',
            'throw' => true,
        ]);

        App::setLocale($locale);
        $cv = \PDF::loadView('cv', ['isPdf' => true, 'withMail' => true])
            ->output();
        $disk->put("$locale/CV_lingyong_sun.pdf", $cv);
        return Command::SUCCESS;
    }
}
