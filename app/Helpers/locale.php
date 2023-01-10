<?php
use Illuminate\Support\Facades\Storage;

function mapLocale ($dir, $subject) {
    $lang = Storage::createLocalDriver(['root' => $dir]);
    return collect($lang->files($subject))
    ->mapWithKeys(function ($file) use ($lang) {
        return [
            basename($file, '.php') => require($lang->path($file))
        ];
    });
}

function availableLocales () {
    $locales = Storage::createLocalDriver(['root' => base_path('lang')]);
    return collect($locales->directories());
}
