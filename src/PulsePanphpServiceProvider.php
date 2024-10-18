<?php

namespace Schmeits\PulsePanphp;

use Livewire\LivewireManager;
use Schmeits\PulsePanphp\Livewire\PanPhpAnalyticsCardComponent;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PulsePanphpServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('pulse-panphp')
            ->hasViews();
    }

    public function packageBooted(): void
    {
        $this->callAfterResolving('livewire', function (LivewireManager $livewire) {
            $livewire->component('pulse.panphp', PanPhpAnalyticsCardComponent::class);
        });
    }
}
