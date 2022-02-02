<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admins')->insert(array(
            array(
                     'name' => "Matrin",
                     'email' => 'matrin@gmail.com',
                     'password' => bcrypt(123456),
                     'created_at'=>date('Y-m-d'),
                     'updated_at'=>date('Y-m-d')
                 ),
            array(
                     'name' => "Mithun Parihar",
                     'email' => 'mithun.sws@gmail.com',
                     'password' => bcrypt(123456),
                     'created_at'=>date('Y-m-d'),
                     'updated_at'=>date('Y-m-d')
                    )
        ));
    }
}
