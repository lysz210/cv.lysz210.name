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
