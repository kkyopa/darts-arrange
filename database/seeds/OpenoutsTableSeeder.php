<?php

use Illuminate\Database\Seeder;

class OpenoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'arrangenumber' => '180',
            'arrangefirst' => 60,
            'arrangesecond' => 60,
            'arrangethird' => 60,
            'arrangememo' => 'テスト',
          ];
        DB::table('openouts')->insert($param);
    }
}