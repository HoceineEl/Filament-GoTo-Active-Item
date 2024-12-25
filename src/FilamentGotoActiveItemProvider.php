<?php

namespace HoceineEl\Fab;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use HoceineEl\Fab\Livewire\FloatingActionButton;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentGotoActiveItemProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-goto-active-item')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToStarRepoOnGitHub('hoceineel/filament-goto-active-item');
            });
    }
 
}
