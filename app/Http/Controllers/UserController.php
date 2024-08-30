<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', ['users'=> $users]);
    }
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return redirect('/users/index')->with('success', 'Client deleted successfully');
    }
        public function store()
    {
        request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'admin' => ['required'],
            'subscription_id' => ['required']
        ]);
            User::create([
                'name'=> request('name'),
                'email'=> request('email'),
                'is_admin'=> request('admin'),
                'subscription_id'=> request('plan'),
                'password'=> Hash::make(request('password'))
            ]);
            return redirect('/user/create')->with('success','Client added successfully');
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


/*

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
    }*/

}
