<?php

namespace Modules\Coinpayment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Modules\Airtime\Classes\AirtimeProcessor;
use Modules\Airtime\Models\Airtime;
use Modules\Base\Http\Controllers\BaseController;

class CoinpaymentController extends BaseController
{
    public function index(Request $request)
    {
        $context = [
            'title' => "Airtimes",
        ];

        return view('index', $context);
    }

    public function manageAirtimePurchase(Request $request, $pk)
    {
        $airtimeProcessor = new AirtimeProcessor();
        $airtime = Airtime::find($pk);

        $context = $airtimeProcessor->processAirtime($airtime);

        Transaction::firstOrCreate([
            'partner_id' => $airtime->partner_id,
            'from_partner_id' => $airtime->partner_id,
            'payment' => $airtime->payment,
            'type' => 'admin-airtime-repurchase',
            'description' => 'Admin Airtime Repurchase',
            'year' => date('Y'),
            'month' => date('n'),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        if ($context['type'] == 'success') {
            Session::flash('success', $context['message']);
        } else {
            Session::flash('error', $context['message']);
        }

        return redirect()->route('manage_airtime_list');
    }

    public function userAirtimePaymentUpdate(Request $request, $pk)
    {
        $airtimeProcessor = new AirtimeProcessor();
        $airtime = Airtime::find($pk);

        $context = $airtimeProcessor->prepareContext($airtime);

        return View::make('user.airtime_payment', $context);
    }

}
