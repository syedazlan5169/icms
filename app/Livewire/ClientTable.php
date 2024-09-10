<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ClientTable extends Component
{
    use WithPagination;
    
    public $search = '';
    public $perPage = 10;
    public $status = '';
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';

    public function setSortBy($sortByField)
    {
        if($this->sortBy === $sortByField)
        {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function getStatusClass($status)
    {
        return match ($status) {
            'Active' => 'inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 w-16 justify-center',
            'Expiring' => 'inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20 w-16 justify-center',
            'Expired' => 'inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20 w-16 justify-center',
            default => '',
        };
    }

    public function render()
    {
        $clients = Client::with('user')->where('user_id', Auth::id())
                        ->when($this->status, function ($query)
                        {
                            $query->where('status', $this->status);
                        })
                        ->orderBy($this->sortBy, $this->sortDir)
                        ->search($this->search)->paginate($this->perPage);

        return view('livewire.client-table', ['clients' => $clients]);
    }
}
