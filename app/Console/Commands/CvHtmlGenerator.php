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
    protected $signature = 'cv:html {locale}';

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
        App::setLocale($this->argument('locale'));
        $cv = view('cv', ['withMail' => false])
            ->toHtml();
        $this->line(base64_encode($cv));
        return Command::SUCCESS;
    }
}
