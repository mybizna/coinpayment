<?php

namespace Modules\Coinpayment\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

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

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('txn_id')->nullable()->html('text');
        $this->fields->string('ipn_version')->nullable()->html('text');
        $this->fields->string('ipn_type')->nullable()->html('text');
        $this->fields->string('ipn_mode')->nullable()->html('text');
        $this->fields->string('ipn_id')->nullable()->html('text');
        $this->fields->string('merchant')->nullable()->html('text');
        $this->fields->string('item_name')->nullable()->html('text');
        $this->fields->string('item_number')->nullable()->html('text');
        $this->fields->string('amount')->nullable()->html('text');
        $this->fields->string('amounti')->nullable()->html('text');
        $this->fields->string('currency')->nullable()->html('text');
        $this->fields->string('status')->nullable()->html('text');
        $this->fields->string('status_text')->nullable()->html('text');
        $this->fields->foreignId('partner_id')->nullable()->html('recordpicker')->relation(['user']);
        $this->fields->foreignId('payment_id')->nullable()->html('recordpicker')->relation(['payment']);

    }



}
