<?php

namespace Modules\Coinpayment\Filament\Resources\CoinpaymentResource\Pages;

use Modules\Coinpayment\Filament\Resources\CoinpaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoinpayment extends EditRecord
{
    protected static string $resource = CoinpaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
