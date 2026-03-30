<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Motor;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {
        $price = Motor::select('id','price')->get();
        $merk = Motor::select('id','merk')->get();
        $year = Motor::select('id','year')->get();
        $idPicked = request()->all();
        $idPicked = $idPicked['sewa'];

        $start_time = \Carbon\Carbon::parse($request->input('pick'));
        $finish_time = \Carbon\Carbon::parse($request->input('return'));

        $price = $price[$idPicked-1]->getAttributes();
        $price = $price['price'];
        $merk = $merk[$idPicked-1]->getAttributes();
        $merk = $merk['merk'];
        $year = $year[$idPicked-1]->getAttributes();
        $year = $year['year'];
        $days = $start_time->diffInDays($finish_time, false);

        $request->request->add(['total_price' => $days * (int)$price * 1000, 'status' => 'Unpaid', 'merk' => $merk, 'year' => $year]);
        $idPicked = request()->all();
        unset($idPicked['sewa']);
        $idPicked['qty'] = $days;
        $rent = Rent::create($idPicked);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                    'order_id' => $rent->id,
                    'gross_amount' => $rent->total_price,
                ),
                'customer_details' => array(
                        'first_name' => $request->name,
                        'last_name' => '',
                        'phone' => $request->phone,
                        'pick' => $request->pick,
                        'return' => $request->return,
                    ),
                );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view ('user.checkout', compact('snapToken', 'rent', 'days', 'merk', 'year'));
    }

    public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key) {
            if($request->transaction_status == 'capture' or $request->transactionStatus == 'settlement') {
                $rent = Rent::find($request->order_id);
                $rent->update(['status' => 'Paid']);
            }
        }
    }

    public function invoice($id) {
        $rent = Rent::find($id);
        $days = $rent->qty;
        $merk = $rent->merk;
        $year = $rent->year;

        return view ('user.invoice', compact('rent', 'days', 'merk', 'year'));
    }
}
