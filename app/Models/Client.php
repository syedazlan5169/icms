<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $guarded = [];

    public function scopeSearch($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where('name', 'like', '%' . $searchTerm . '%')
                         ->orWhere('category', 'like', '%' . $searchTerm . '%')
                         ->orWhere('mykad_ssm', 'like', '%' . $searchTerm . '%')
                         ->orWhere('status', 'like', '%' . $searchTerm . '%')
                         ->orWhere('state', 'like', '%' . $searchTerm . '%');
        }

        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
