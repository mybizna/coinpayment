<?php

namespace Modules\Coinpayment\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Coinpayment\Models\Coinpayment;

class CoinpaymentResource extends BaseResource
{
    protected static ?string $model = Coinpayment::class;

    protected static ?string $slug = 'coinpayment/coinpayment';

    protected static ?string $navigationGroup = 'Account';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationParentItem = 'Gateway';

}
