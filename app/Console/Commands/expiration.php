<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Artist;
class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artist:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire artist every Month automatically';

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
        $artists = Artist::where('Expiration', 1)->get(); //collection of Artist
        foreach ($artists as $artist) {
            $artist->update(['Expiration' => 0]);
        }
    }
}
