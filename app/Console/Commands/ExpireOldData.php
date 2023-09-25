<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ReceivedRequest;
use Carbon\Carbon;

class ExpireOldData extends Command
{
    protected $signature = 'data:expire';
    protected $description = 'Expire old data that is older than 7 days';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sevenDaysAgo = Carbon::now()->subDays(7);

        ReceivedRequest::where('timestamp', '<', $sevenDaysAgo)
            ->update([
                'method' => 'Data Expired',
                'headers' => 'Data Expired',
                'body' => 'Data Expired',
                'query_params' => 'Data Expired',
                'ip_address' => 'Data Expired',
                'user_agent' => 'Data Expired',
            ]);

        $this->info('Old data has been expired.');
    }
}
