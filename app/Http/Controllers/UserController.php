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
            'is_admin' => ['required'],
            'subscription_id' => ['required']
        ]);
            User::create([
                'name'=> request('name'),
                'email'=> request('email'),
                'is_admin'=> request('is_admin'),
                'subscription_id'=> request('subscription_id'),
                'subscription_start_date'=> request('subscription_start_date'),
                'subscription_end_date'=> request('subscription_end_date'),
                'password'=> Hash::make(request('password'))
            ]);
            return redirect('/user/create')->with('success','Client added successfully');
    }
    public function patch($id)
    {
        $user = User::findOrFail($id);
        request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'is_admin' => ['required'],
            'subscription_id' => ['required'],
        ]);
            $user->update([
                'name'=> request('name'),
                'email'=> request('email'),
                'is_admin'=> request('is_admin'),
                'subscription_id'=> request('subscription_id'),
                'subscription_start_date'=> request('subscription_start_date'),
                'subscription_end_date'=> request('subscription_end_date')
            ]);

            if (!empty(request('password')))
            {
                $user->update(['password' => Hash::make(request('password'))]);
            }
                
            return redirect()->route('user.show', ['id' => $user->id])->with('success', 'User updated successfully');

    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user'=> $user]);
    }

}
