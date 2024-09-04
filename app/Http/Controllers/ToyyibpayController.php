<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ToyyibpayController extends Controller
{
    public function renewSubscription($id)
    {
        $subscription =  Subscription::findOrFail($id);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $price = 100 * $subscription->price;
        $orderNumber = 'SY-' . strtoupper(Str::random(10));

        $bill = [
            'userSecretKey'=> config('services.toyyibpay.secretKey'),
            'categoryCode'=> config('services.toyyibpay.category'),
            'billName'=> $subscription->name,
            'billDescription'=> $subscription->description,
            'billPriceSetting'=>1,
            'billPayorInfo'=>1,
            'billAmount'=> $price,
            'billReturnUrl'=> route('toyyibpay-redirect'),
            'billCallbackUrl'=> route('toyyibpay-callback'),
            'billExternalReferenceNo' => $orderNumber,
            'billTo'=> Auth::user()->name,
            'billEmail'=> Auth::user()->email,
            'billPhone'=> Auth::user()->phone,
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>'0',
            'billContentEmail'=>'Thank you for purchasing our product!',
            'billExpiryDate'=>'17-12-2024 17:00:00',
            'billExpiryDays'=>3    
        ];
        //dd($bill);

        $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
        $response = Http::asForm()->post($url, $bill);

        if ($response->successful() && isset($response[0]['BillCode'])) {
            $billCode = $response[0]['BillCode'];
            return redirect()->away('https://dev.toyyibpay.com/' . $billCode);
        } else {
            Log::error('ToyyibPay API Error: ' . $response->body());
            return redirect()->back()->withErrors('Failed to create bill. Please try again.');
        }

    }
    public function changeSubcription()
    {

    }
    public function handleToyyibpayRedirect(Request $request)
    {
        $statusId = $request->query('status_id');
        $billcode = $request->query('billcode');
        $orderId = $request->query('order_id');
        
        return view('thankyou', compact('statusId', 'billcode', 'orderId'));
    }

    public function handleToyyibpayCallback()
    {
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount', 'transaction_time']);
        Log::info($response);
    }

}
