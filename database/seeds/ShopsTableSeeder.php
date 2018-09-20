<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops')->insert([
            'name' => str_random(10),
            'slug' => str_slug('shop', $separator = '-'),
            'distance' => random(1000)
        ]);
    }
}
