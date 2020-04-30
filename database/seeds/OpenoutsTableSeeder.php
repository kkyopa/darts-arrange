<?php

use App\Openout;
use Illuminate\Database\Seeder;
use App\User;

class OpenoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Openout::class, 3)->create();
    }
}