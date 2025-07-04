<?php

namespace HayderHatem\FilamentNaturalLanguageFilter;

use Illuminate\Support\ServiceProvider;
use HayderHatem\FilamentNaturalLanguageFilter\Services\NaturalLanguageProcessor;
use HayderHatem\FilamentNaturalLanguageFilter\Contracts\NaturalLanguageProcessorInterface;

class FilamentNaturalLanguageFilterServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/filament-natural-language-filter.php',
            'filament-natural-language-filter'
        );

        $this->app->singleton(
            NaturalLanguageProcessorInterface::class,
            NaturalLanguageProcessor::class
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/filament-natural-language-filter.php' => config_path('filament-natural-language-filter.php'),
            ], 'filament-natural-language-filter-config');
        }
    }
}
