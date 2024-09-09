<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function calculateConvertedDays(User $user, Subscription $currentSubscription, Subscription $newSubscription)
    {
        $remainingDays = now()->diffInDays($user->subscription_end_date, false);

        $days = ceil(($remainingDays * $currentSubscription->time_value) / $newSubscription->time_value);

        Log::info($days);

        return $days;
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
