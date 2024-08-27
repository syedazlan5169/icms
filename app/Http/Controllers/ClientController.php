<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('user')->paginate(10);
        return view('client.index', ['clients'=> $clients]);
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/index')->with('success', 'Client deleted successfully');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('client.show', ['client'=> $client]);
    }

}
