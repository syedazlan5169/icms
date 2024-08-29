<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::id(); 
        $clients = Client::with('user')->where('user_id', $currentUserId)->paginate(10);
        return view('client.index', ['clients'=> $clients]);
    }
    public function expired()
    {
        $currentUserId = Auth::id();
        $clients = Client::with('user')->where('user_id',$currentUserId)->where('status','Expiring')->paginate(10);
        return view('client.expired', ['clients'=> $clients]);
    }
    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'mykad_ssm' => ['required'],
            'phone' => ['required'],
            'address1' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postcode' => ['required'],
            'category' => ['required'],
            'insurance_company' => ['required'],
            'premium' => ['required']
        ]);
            Client::create([
                'user_id'=> Auth::id(),
                'name'=> request('name'),
                'mykad_ssm'=> request('mykad_ssm'),
                'phone'=> request('phone'),
                'address1'=> request('address1'),
                'address2'=> request('address2'),
                'city'=> request('city'),
                'state'=> request('state'),
                'postcode'=> request('postcode'),
                'category'=> request('category'),
                'vehicle_model'=> request('vehicle_model'),
                'plate'=> request('plate'),
                'insurance_company'=> request('insurance_company'),
                'premium'=> request('premium'),
                'inception_date'=> request('inception_date'),
                'expiry_date'=> request('expiry_date'),
                'renewal_date'=> request('renewal_date'),
                'reminder_date'=> request('reminder_date')
            ]);
            return redirect('/create')->with('success','Client added successfully');
    }
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/index')->with('success', 'Client deleted successfully');
    }
    public function show($id)
    {
        $currentUserId = Auth::id();
        $client = Client::findOrFail($id);
        if ($currentUserId == $client->user_id)
        {
            return view('client.show', ['client'=> $client]);
        }
        else
        {
            return view('errors.404');
        }
    }
    public function patch($id)
    {
        $currentUserId = Auth::id();
        $client = Client::findOrFail($id);
        request()->validate([
            'name' => ['required'],
            'mykad_ssm' => ['required'],
            'phone' => ['required'],
            'address1' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postcode' => ['required'],
            'category' => ['required'],
            'insurance_company' => ['required'],
            'premium' => ['required']
        ]);
        if ($currentUserId == $client->user_id)
        {
            $client->update([
                'name'=> request('name'),
                'mykad_ssm'=> request('mykad_ssm'),
                'phone'=> request('phone'),
                'address1'=> request('address1'),
                'address2'=> request('address2'),
                'city'=> request('city'),
                'state'=> request('state'),
                'postcode'=> request('postcode'),
                'category'=> request('category'),
                'vehicle_model'=> request('vehicle_model'),
                'plate'=> request('plate'),
                'insurance_company'=> request('insurance_company'),
                'premium'=> request('premium'),
                'inception_date'=> request('inception_date'),
                'expiry_date'=> request('expiry_date'),
                'renewal_date'=> request('renewal_date'),
                'reminder_date'=> request('reminder_date')
            ]);
            return redirect()->route('client.show', ['id' => $client->id])->with('success', 'Client updated successfully');
        }
        else
        {
            return view('errors.404');
        }
    }
    
}
