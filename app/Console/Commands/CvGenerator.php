<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class CvGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cv:make';

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
        App::setLocale('it');
        $cv = \PDF::loadView('cv', ['isPdf' => true, 'withMail' => true])
            ->save("CV-it-lingyong-sun.pdf");
        return Command::SUCCESS;
    }
}
