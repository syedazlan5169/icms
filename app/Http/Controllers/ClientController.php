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
}
