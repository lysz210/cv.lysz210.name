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
    protected $signature = 'cv:pdf  {locale}';

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
        App::setLocale($this->argument('locale'));
        $cv = \PDF::loadView('cv', ['isPdf' => true, 'withMail' => true])
            ->output();
        $this->line(base64_encode($cv));
        return Command::SUCCESS;
    }
}
