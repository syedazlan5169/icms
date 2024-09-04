<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ToyyibpayController extends Controller
{
    public function createBill()
    {
        $bills = [
            'userSecretKey'=> 'mk0u3obj-ez6b-apxz-e1wo-yfpr4dy23mz0',
            'categoryCode'=> 'cfzsga9e',
            'billName'=>'ICMS Pro Plan',
            'billDescription'=>'ICMS Pro Plan Monthly',
            'billPriceSetting'=>1,
            'billPayorInfo'=>1,
            'billAmount'=>3000,
            'billReturnUrl'=> route('toyyibpay-status'),
            'billCallbackUrl'=> route('toyyibpay-callback'),
            'billExternalReferenceNo' => 'INVOICE-001',
            'billTo'=>'Syed Azlan',
            'billEmail'=>'syedazlan5169@gmail.com',
            'billPhone'=>'0125259238',
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>'0',
            'billContentEmail'=>'Thank you for purchasing our product!',
            'billExpiryDate'=>'17-12-2024 17:00:00',
            'billExpiryDays'=>3    
        ];

        $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
        $response = Http::asForm()->post($url, $bills);
        
        if ($response->successful() && isset($response[0]['BillCode'])) {
            $billCode = $response[0]['BillCode'];
            return redirect()->away('https://dev.toyyibpay.com/' . $billCode);
        } else {
            return redirect()->back()->withErrors('Failed to create bill. Please try again.');
        }

    }

    public function paymentStatus()
    {
        $response = request()->all(['status_id', 'billcode', 'order_id']);
        dd($response);
    }

    public function callback()
    {
        $response = request()->all(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount', 'transaction_time']);
        Log::info($response);
    }

}
