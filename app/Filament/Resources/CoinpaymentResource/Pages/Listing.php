<?php

namespace Modules\Coinpayment\Filament\Resources\CoinpaymentResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Coinpayment\Filament\Resources\CoinpaymentResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = CoinpaymentResource::class;
}
