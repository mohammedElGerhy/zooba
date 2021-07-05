<?php

namespace App\Console\Commands;

use App\Models\Request_all_use;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class delete_request extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete request';

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
       Artisan::call(DB::table('request_all_uses')->where('deleted_at', '!=',null)->delete());

    }
}
