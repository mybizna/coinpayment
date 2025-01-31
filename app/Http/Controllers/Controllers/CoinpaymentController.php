<?php
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Modules\Coinpayment\Classes\CoinpaymentProcessor;
use Modules\Base\Http\Controllers\BaseController;

class CoinpaymentController extends BaseController
{
    public function index(Request $request)
    {
        $context = [
            'title' => "Payment",
        ];

        return view('index', $context);
    }

    public function paymentCoinReturn(Request $request)
    {
        $coinpaymentProcessor = new CoinpaymentProcessor();
        $payment = $coinpaymentProcessor->paymentCoinReturn($request);
        $response = $request->input('response');

        if ($response === 'json') {
            $message = 'Payment was Successful';
            $newPayment = $payment->toArray();
            $response = [
                'status' => 200,
                'message' => $message,
                'payment' => $newPayment,
            ];
            return JsonResponse::create($response);
        }

        if ($payment->next_to) {
            return redirect($payment->next_to);
        } else {
            return redirect('user_payment_list');
        }
    }

    public function paymentCoinCancel(Request $request)
    {
        $coinpaymentProcessor = new CoinpaymentProcessor();
        $payment = $coinpaymentProcessor->paymentCoinCancel($request);
        $response = $request->input('response');

        if ($response === 'json') {
            $message = 'Payment was Cancelled';
            $newPayment = $payment->toArray();
            $response = [
                'status' => 200,
                'message' => $message,
                'payment' => $newPayment,
            ];
            return JsonResponse::create($response);
        }

        if ($payment->next_to) {
            return redirect($payment->next_to);
        } else {
            return redirect('user_payment_list');
        }
    }

    public function paymentCoinNotify(Request $request)
    {
        $coinpaymentProcessor = new CoinpaymentProcessor();
        $payment = $coinpaymentProcessor->paymentCoinNotify($request);
        $response = $request->input('response');

        if ($response === 'json') {
            $message = 'Payment was Successful';
            $newPayment = $payment->toArray();
            $response = [
                'status' => 200,
                'message' => $message,
                'payment' => $newPayment,
            ];
            return JsonResponse::create($response);
        }

        if ($payment->next_to) {
            return redirect($payment->next_to);
        } else {
            return redirect('user_payment_list');
        }
    }
}
