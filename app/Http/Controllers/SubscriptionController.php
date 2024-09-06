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
}
