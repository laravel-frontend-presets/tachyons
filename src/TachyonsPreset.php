<?php

namespace Dyrynda\LaravelPresets\Tachyons;

use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class TachyonsPreset extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateSass();
        static::updateBootstrapping();
        static::updateWelcomePage();
        static::removeNodeModules();
    }

    public static function installAuth()
    {
        static::install();
        static::scaffoldAuth();
    }

    protected static function updatePackageArray(array $packages)
    {
        return [
            'tachyons-sass' => '^4.7.4',
        ] + Arr::except($packages, ['bootstrap-sass', 'jquery']);
    }

    protected static function updateSass()
    {
        copy(__DIR__.'/tachyons-stubs/app.scss', resource_path('assets/sass/app.scss'));
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/tachyons-stubs/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }

    protected static function updateWelcomePage()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));

        copy(__DIR__.'/tachyons-stubs/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());

        file_put_contents(
            base_path('routes/web.php'),
            "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );

        (new Filesystem)->copyDirectory(__DIR__.'/tachyons-stubs/views', resource_path('views'));
    }

    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/tachyons-stubs/controllers/HomeController.stub')
        );
    }
}
