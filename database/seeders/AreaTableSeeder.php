<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->delete();
////////////// insert 1
        $area = [

                 'السلام', 'المرج','المعادى','المقطم','الخليفة',' البساتين','السيدة زينب','15 مايو',

        ];
        foreach ($area as $n){
            Area::create(['name' => $n, 'citie_id' => 1]);
        }
        //////////insert 2
        $area2 = [

                'محرم بك', 'باكوس','الحضرة','الأزاريطة','سموحة',' العجمي','ڤيكتوريا','سان استيفانو',

        ];
        foreach ($area2 as $n2){
            Area::create(['name' => $n2, 'citie_id' => 2]);
        }
        //////////insert 3
        $area3 = [

            'الدقي', 'العجوزة','العمرانية','الهرم','الوراق',' بولاق الدكرور','الهرم','فيصل',

        ];
        foreach ($area3 as $n3){
            Area::create(['name' => $n3, 'citie_id' => 3]);
        }
        //////////insert 4
        $area4 = [

            'الحمام', 'العلمين','الضبعة','النجيلة','براني','سيوة','الضبعة','السلوم',

        ];
        foreach ($area4 as $n4){
            Area::create(['name' => $n4, 'citie_id' => 4]);
        }
        //////////insert 5
        $area5 = [

            'مدينة الصف', 'أطفيح','حي التبين','عين حلوان','وادي حوف','حدائق حلوان','حي المعصرة',

        ];
        foreach ($area5 as $n5){
            Area::create(['name' => $n5, 'citie_id' => 5]);
        }

    }
}
