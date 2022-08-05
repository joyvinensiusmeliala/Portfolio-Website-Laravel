<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'nama'=>"Joy Vinensius Meliala",
            'email'=>"jvinensius@gmail.com",
            // 'phone'=>"+060 (800) 801-582",
        );
        DB::table('profile')->insert($data);
    }
}
