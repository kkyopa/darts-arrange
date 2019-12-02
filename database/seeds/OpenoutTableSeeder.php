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
            // 'id'=> '1',
            'user_id' => 1,
            'arrangefirst' => 1,
            'arrangesecond' => 0,
            'arrangethird' => 0,
            'arrangememo' => 'アレンジメモ',
        ];
        DB::table('openout')->insert($param);
    }
}
