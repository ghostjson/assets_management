<?php

namespace App\Console\Commands;

use App\Mail\SoftwareExpireNotiMail;
use App\Models\License;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendExpireNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:software_expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $licenses = License::all();
        $dates = 0;

        foreach ($licenses as $license) {
            if (Carbon::now()->addDays(7)->greaterThan($license->license_expire)) {
                Mail::send(
                    new SoftwareExpireNotiMail([
                        'license_expire' => $license->license_expire->toDateString(),
                        'product' => $license->product
                    ])
                );
            }
        }
    }
}
