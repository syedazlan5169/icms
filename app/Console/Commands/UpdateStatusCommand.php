<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;

class UpdateStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating client status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        Client::where('expiry_date', '<', $now)->update(['status' => 'Expired']);

        Client::where('inception_date', '<=', $now)
                 ->where('expiry_date', '>', $now)
                 ->update(['status' => 'Active']);

        Client::where('expiry_date', '<=', $now->copy()->addMonth())
                 ->where('expiry_date', '>', $now)
                 ->update(['status' => 'Expiring']);

        User::where('subscription_end_date', '<', $now)->update(['subscription_status' => 'Expired']);
        User::where('subscription_end_date', '>', $now)->update(['subscription_status' => 'Active']);

        $this->info('Status updated successfully.');
    }
}
