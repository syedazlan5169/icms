<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;

class ToyyibpayController extends Controller
{
    public function createOrder($orderId, $subscriptionID)
    {
        Order::create([
            'user_id'=> Auth::user()->id,
            'subscription_id' => $subscriptionID,
            'order_id' => $orderId,
        ]);
    }
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
            'billReturnUrl'=> route('payment-status'),
            'billCallbackUrl'=> 'https://present-hedgehog-needlessly.ngrok-free.app/toyyibpay-callback',
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

        $this->createOrder($orderNumber, $id);

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
    public function changeSubscription($id)
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
            'billReturnUrl'=> route('payment-status'),
            'billCallbackUrl'=> 'https://present-hedgehog-needlessly.ngrok-free.app/toyyibpay-callback',
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

        $this->createOrder($orderNumber, $id);

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
    public function handleToyyibpayRedirect(Request $request)
    {
        $statusId = $request->query('status_id');
        $billcode = $request->query('billcode');
        $orderId = $request->query('order_id');
        
        return view('payment-status', compact('statusId', 'billcode', 'orderId'));
    }

    public function handleToyyibpayCallback(Request $request)
    {
        $response = $request->only(['refno', 'status', 'reason', 'billcode', 'order_id', 'amount', 'transaction_time']);
        
        $order = Order::where('order_id', $response['order_id'])->firstOrFail();
        $user = User::findOrFail($order->user_id);
        $currentSubscription = Subscription::findOrFail($user->subscription_id);
        $newSubscription = Subscription::findOrFail($order->subscription_id);
        

        $currentEndDate = $user->subscription_end_date ? Carbon::parse($user->subscription_end_date) : Carbon::now();

        if ($response['status'] === '1') {
            if ($order->subscription_id > $user->subscription_id)
            {
                $convertedDays = Subscription::calculateUpgradeDays($user, $currentSubscription, $newSubscription);
                $newEndDate = now()->addDays($convertedDays + $newSubscription->duration_in_days);
            }
            else if ($order->subscription_id < $user->subscription_id)
            {
                $convertedDays = Subscription::calculateDowngradeDays($user, $currentSubscription, $newSubscription);
                $newEndDate = now()->addDays($convertedDays + $newSubscription->duration_in_days);
            }
            else
            {
                $newEndDate = $currentEndDate->addDays($newSubscription->duration_in_days);
            }

            $user->update([
                'subscription_id' => $newSubscription->id,
                'subscription_end_date' => $newEndDate,
            ]);

            Log::info('User subscription updated successfully.', [
                'user_id' => $user->id, 
                'subscription_id' => $newSubscription->id
            ]);
        } else {
            Log::warning('Payment was unsuccessful.', [
                'order_id' => $response['order_id'], 
                'status' => $response['status']
            ]);
        }

        $order->update($response);
    }


}
