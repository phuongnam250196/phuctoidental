<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        // 	'email' => 'tpn250196@gmail.com',
        //     'password' => bcrypt('tpn@123456'),
        //     'level' => 1,
        // ];
        $data = [
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'level' => 0,
        ];
        DB::table('users')->insert($data);
    }
}
