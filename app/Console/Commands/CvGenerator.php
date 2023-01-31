<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class CvGenerator extends Command
{
    const NAMES = [
        'html' => 'index.html',
        'pdf' => 'CV_lingyong_sun.pdf'
    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cv:gen {format*}  {--locale=*} {--outputDir=build}';

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
        $outputDir = $this->option('outputDir');
        $disk = Storage::build([
            'driver' => 'local',
            'root' => base_path("$outputDir"),
            'visibility' => 'private',
            'throw' => true,
        ]);
        collect($this->argument('format'))
            ->crossJoin($this->option('locale'))
            ->each(function($elt) use ($disk) {
                $this->generate($elt[0], $elt[1], $disk);
            });
        return Command::SUCCESS;
    }

    protected function generate($format, $locale, $disk) {
        $cv = $this->output($format, $locale);
        $name = static::NAMES[$format];
        $disk->put("$locale/$name", $cv);
    }

    protected function output($format, $locale) {
        App::setLocale($locale);
        return $format === 'html'
            ? view('cv', ['withMail' => false])->toHtml()
            : \PDF::loadView('cv', ['isPdf' => true, 'withMail' => true])->output();
    }
}
