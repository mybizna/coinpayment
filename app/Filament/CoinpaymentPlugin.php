<?php

namespace Modules\Coinpayment\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class CoinpaymentPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Coinpayment';
    }

    public function getId(): string
    {
        return 'coinpayment';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
