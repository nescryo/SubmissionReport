<?php

if (! class_exists('Filament\Schemas\Schema') && class_exists('Filament\Forms\Form')) {
    class_alias('Filament\Forms\Form', 'Filament\Schemas\Schema');
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    spl_autoload_register(function ($class) {
        $prefix = 'SubmissionReport\\';
        $baseDir = __DIR__ . '/src/';
        $len = strlen($prefix);

        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }

        $relativeClass = substr($class, $len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    });
}

use SubmissionReport\SubmissionReportPlugin;

return new SubmissionReportPlugin;
