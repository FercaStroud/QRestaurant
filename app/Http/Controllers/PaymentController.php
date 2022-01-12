<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use MercadoPago\SDK;

class PaymentController extends Controller
{
    public function index()
    {
    }

    public function getUserStatus()
    {
        $lastPayment = Payment::where("user_id", "=", auth()->user()->id)->latest('created_at')->first();
        $paymentStatus = false;

        if ($lastPayment !== null) {
            $paymentStatus = Carbon::now()->between(
                Carbon::parse($lastPayment->start_date), Carbon::parse($lastPayment->end_date)
            );
        }

        return response()->json($paymentStatus);
    }

    public function getByUserId()
    {
        $payments = Payment::where([
            ['user_id', '=', auth()->user()->id],
            ['preference_status', '=', 1],
        ])->with('user')->get();

        foreach ($payments as $key => $payment) {
            if ($payment->collection_status != 'approved') {
                $payments[$key]['_rowVariant'] = 'danger';
            } else {
                $payments[$key]['_rowVariant'] = 'success';
            }
        }
        return $payments;
    }

    public function preference(Request $request): \Illuminate\Http\JsonResponse
    {
        SDK::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));
        $preference = new Preference();
        $payer = new Payer();
        $price = 60.0;

        $payer->name = auth()->user()->name;
        $payer->surname = auth()->user()->lastname;
        $payer->email = auth()->user()->email;
        $preference->payer = $payer;

        $item = new Item();
        $item->title = 'Suscripción mensual a Q-Restaurant';
        $item->quantity = 1;
        $item->unit_price = $price;
        $item->currency_id = "USD";
        $preference->items = [$item];
        $preference->back_urls = [
            "failure" => env('APP_URL') . ":8000/api/checkout/feedback",
            "success" => env('APP_URL') . ":8000/api/checkout/feedback",
            "pending" => env('APP_URL') . ":8000/api/checkout/feedback"
        ];/*
        $preference->back_urls = [
            "failure" => env('APP_URL') . "/api/checkout/feedback",
            "success" => env('APP_URL') . "/api/checkout/feedback",
            "pending" => env('APP_URL') . "/api/checkout/feedback"
        ];*/
        $preference->auto_return = "approved";
        $preference->payment_methods = [
            "excluded_payment_types" => [
                ["id" => "ticket"], ["id" => "atm"], ["id" => "digital_currency"]
            ]
        ];
        $preference->save();

        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->price = $price;
        $payment->total = $price;
        $payment->preference_id = $preference->id;
        $payment->preference_status = 1;
        $payment->feedback_status = 0;
        $payment->save();

        //Mail::send(new CreatePreferenceMail($payment));

        return response()->json(['id' => $preference->id], 200);

    }

    public function feedback(Request $request)
    {
        $payment = Payment::where('preference_id', '=', $request->get('preference_id'))->get();

        if ($payment[0]->feedback_status === 1) {
            return response()->json(['ERROR' => 'PREFERENCE_ID PROCESADO CON ANTERIORIDAD'], 200);
        }

        $payment = Payment::find($payment[0]->id);
        $payment->collection_id = $request->get('collection_id');
        $payment->collection_status = $request->get('collection_status');
        $payment->payment_id = $request->get('payment_id');
        $payment->status = $request->get('status');
        $payment->external_reference = $request->get('external_reference');
        $payment->payment_type = $request->get('payment_type');
        $payment->merchant_order_id = $request->get('merchant_order_id');
        $payment->preference_id = $request->get('preference_id');
        $payment->site_id = $request->get('site_id');
        $payment->processing_mode = $request->get('processing_mode');
        $payment->merchant_account_id = $request->get('merchant_account_id');

        $payment->feedback_status = 1;
        $payment->save();

        if ($request->get('status') === 'approved') {
            //Mail::send(new FeedbackMail($payment));
            return response()->view('responses.feedback_success',
                [
                    'payment' => $payment
                ]
            );
        } else {
            return response()->json(['ERROR' => 'PAGO NO APROBADO'], 200);
        }
    }
}
