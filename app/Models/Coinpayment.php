<?php

namespace Modules\Coinpayment\Models;

use Modules\Base\Models\BaseModel;

class Coinpayment extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['txn_id', 'ipn_version', 'ipn_type', 'ipn_mode', 'ipn_id', 'merchant', 'item_name', 'item_number', 'amount', 'amounti', 'currency', 'status', 'status_text', 'partner_id', 'payment_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "Coinpayment";
}
