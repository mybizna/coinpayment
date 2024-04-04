<?php

/** @var \Modules\Base\Classes\Fetch\Rights $this */

$this->add_right("coinpayment", "coinpayment", "administrator", view:true, add:true, edit:true, delete:true);
$this->add_right("coinpayment", "coinpayment", "manager", view:true, add:true, edit:true, delete:true);
$this->add_right("coinpayment", "coinpayment", "supervisor", view:true, add:true, edit:true, delete:true);
$this->add_right("coinpayment", "coinpayment", "staff", view:true, add:true, edit:true);
$this->add_right("coinpayment", "coinpayment", "registered", view:true, add:true);
$this->add_right("coinpayment", "coinpayment", "guest", view:true, );
