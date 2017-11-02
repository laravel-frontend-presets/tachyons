<?php

namespace LaravelFrontendPresets\TachyonsPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class TachyonsPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('tachyons', function ($command) {
            TachyonsPreset::install();

            $command->info('Tachyons scaffolding installed successfully.');
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        PresetCommand::macro('tachyons-auth', function ($command) {
            TachyonsPreset::installAuth();

            $command->info('Tachyons scaffolding with auth views installed successfully.');
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
