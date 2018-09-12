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
                'name'=>'iPhone'
            ],
            [
                'name'=>'SamSung'
            ],
            [
                'name'=>'Sony'
            ],
            [
                'name'=>'OPPO'
            ],
            [
                'name'=>'Xaomi'
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
