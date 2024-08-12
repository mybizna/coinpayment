<?php

namespace Modules\Coinpayment\Filament\Resources\CoinpaymentResource\Pages;

use Modules\Coinpayment\Filament\Resources\CoinpaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoinpayments extends ListRecords
{
    protected static string $resource = CoinpaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
