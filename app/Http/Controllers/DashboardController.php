<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function dashboard()
    {
        $currentUserId = Auth::id();
    
        // Total Clients
        $totalClients = Client::where('user_id', $currentUserId)->count();
        // Expiring Clients
        $expiringClients = Client::where('user_id', $currentUserId)
                                 ->where('status', 'Expiring')
                                 ->count();
        // Total Expiring Premium
        $totalExpiring = Client::where('user_id', $currentUserId)
                               ->where('status', 'Expiring')
                               ->sum('premium');
        
        $totalExpiringFormatted = 'RM ' . number_format($totalExpiring, 2, '.', ',');

        return view('dashboard', compact('totalClients', 'expiringClients', 'totalExpiringFormatted'));
    }
}
