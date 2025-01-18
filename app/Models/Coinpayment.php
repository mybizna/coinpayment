<?php

namespace Modules\Coinpayment\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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
    protected $table = "coinpayment_coinpayment";

    public function migration(Blueprint $table): void
    {

        $table->string('txn_id')->nullable();
        $table->string('ipn_version')->nullable();
        $table->string('ipn_type')->nullable();
        $table->string('ipn_mode')->nullable();
        $table->string('ipn_id')->nullable();
        $table->string('merchant')->nullable();
        $table->string('item_name')->nullable();
        $table->string('item_number')->nullable();
        $table->string('amount')->nullable();
        $table->string('amounti')->nullable();
        $table->string('currency')->nullable();
        $table->string('status')->nullable();
        $table->string('status_text')->nullable();
        $table->foreignId('partner_id')->nullable()->constrained(table: 'partner_partner')->onDelete('set null');
        $table->foreignId('payment_id')->nullable()->constrained(table: 'account_payment')->onDelete('set null');

    }
}
