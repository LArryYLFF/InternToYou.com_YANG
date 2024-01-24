<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 添加用户测试数据
        DB::table('users')->insert([
            'name' => 'a',
            'email' => 'a@a.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
