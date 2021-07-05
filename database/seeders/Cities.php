<?php

namespace Database\Seeders;

use App\Models\Citie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Cities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        $citie = [
            'القاهرة',
            'الإسكندرية',
            'الجيزة',
            'مطروح',
            'حلوان',
        ];

        foreach ($citie as $n){
           Citie::create(['Name' => $n]);
        }
    }
}
