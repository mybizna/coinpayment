<?php

namespace Modules\Coinpayment\Classes;

use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\Paymentcoin;
use Modules\Payment\Entities\Coinpayment;
use Modules\Payment\Classes\PaymentProcessor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class CoinpaymentProcessor
{
    public function paymentCoinReturn($request)
    {
        $paymentId = $request->input('item_number');

        $payment = Payment::find($paymentId);

        $this->completeTransaction($payment);

        return $payment;
    }

    public function paymentCoinCancel($request)
    {
        $itemNumber = $request->input('item_number');

        $payment = Payment::find($itemNumber);

        $this->cancelTransaction($payment);

        return $payment;
    }

    public function paymentCoinNotify($request)
    {
        $itemNumber = $request->input('item_number');

        $payment = Payment::find($itemNumber);

        $this->notificationTransaction($payment);

        return $payment;
    }

    public function notificationTransaction($payment)
    {
        $this->processCoinpayment($payment);
    }

    public function completeTransaction($payment)
    {
        $this->notificationTransaction($payment);
    }

    public function pendingTransaction($payment)
    {
        $paymentProcessor = new PaymentProcessor();
        $paymentProcessor->pendingTransaction($payment);
    }

    public function cancelTransaction($payment)
    {
        $paymentProcessor = new PaymentProcessor();
        $paymentProcessor->cancelTransaction($payment);
    }

    public function processCoinpayment($payment)
    {
        $isValid = false;
        $orderCurrency = 'USD';

        $paymentProcessor = new PaymentProcessor();

        $coinpayment = Coinpayment::create([
            'txn_id' => $request->input('txn_id'),
            'ipn_version' => $request->input('ipn_version'),
            'ipn_type' => $request->input('ipn_type'),
            'ipn_mode' => $request->input('ipn_mode'),
            'ipn_id' => $request->input('ipn_id'),
            'merchant' => $request->input('merchant'),
            'item_name' => $request->input('item_name'),
            'item_number' => $request->input('item_number'),
            'amount' => $request->input('amount'),
            'amounti' => $request->input('amounti'),
            'currency' => $request->input('currency'),
            'status' => $request->input('status'),
            'user_id' => $payment->user_id,
            'payment_id' => $payment->id,
        ]);

        $paidAmount = $coinpayment->amount ?? 0;

        if (!$payment->successful) {
            if ($coinpayment->status >= 100 || $coinpayment->status == 2) {
                $paymentProcessor->savePaidAmount($payment, $requiredAmount, $paidAmount);

                if ($paidAmount >= $requiredAmount) {
                    $paymentProcessor->successfulTransaction($payment, $payment->code);
                } else {
                    $paymentProcessor->failTransaction($payment);
                }

                $isValid = false;
            } elseif ($coinpayment->status < 0) {
                $isValid = false;
                $paymentProcessor->failTransaction($payment);
            } else {
                $isValid = false;
                $paymentProcessor->pendingTransaction($payment);
            }
        }

        return $isValid;
    }
}
