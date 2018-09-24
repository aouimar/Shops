<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        factory(App\User::class, 1)->create();
        factory(App\Shop::class, 8)->create();
    }
}
