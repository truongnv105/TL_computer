<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $data = [
            [
                'name'=>'iPhone',
                'slug'=>str_slug('iPhone')
            ],
            [
                'name'=>'SamSung',
                'slug'=>str_slug('SamSung')
            ],
            [
                'name'=>'Sony',
                'slug'=>str_slug('Sony')
            ],
            [
                'name'=>'OPPO',
                'slug'=>str_slug('OPPO')
            ],
            [
                'name'=>'Xaomi',
                'slug'=>str_slug('Xaomi')
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
