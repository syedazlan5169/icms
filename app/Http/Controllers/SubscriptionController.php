<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();

        return view('pricing', ['subscription'=> $subscriptions]);
    }
    public function manageSubscription()
    {
        $subscriptions = Subscription::all();
        
        return view('manage-subscription', ['subscriptions'=> $subscriptions]);
    }
    public function renew($id)
    {
        $subscription = Subscription::where('id', $id)->first();

        $price = 100 * $subscription->price;
        $userBill = [
            'billName'=> $subscription->name,
            'billDescription'=> $subscription->description,
            'billAmount'=>$price,
            'billTo'=>Auth::user()->name,
            'billEmail'=>Auth::user()->email,
            'billPhone'=>Auth::user()->phone,
        ];

        return redirect()->route('toyyibpay-create', ['userBill' => $userBill]);
    }
}
