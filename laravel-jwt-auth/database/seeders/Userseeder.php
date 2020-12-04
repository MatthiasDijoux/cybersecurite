<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'email' => 'admin@admin.com',
                'name' => 'denis',
                'password' => bcrypt('admin2'),
            ],
        ];
        DB::table('users')->insert($array);
    }
}
