<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BannerBottom extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banner_bottoms')->insert(array(
            array(
                     'title' => "40+ Languages",
                     'description' => 'Offering Multilingual Choices',
                     'created_at'=>date('Y-m-d h:i:s'),
                     'updated_at'=>date('Y-m-d h:i:s')
                 ),
            array(
                    'title' => "480+ Castes",
                    'description' => 'Within India & Abroad',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ),
            array(
                    'title' => "3200+ Cities",
                    'description' => 'Across 4 countries of operation',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                ),
            array(
                    'title' => "4 Countries",
                    'description' => 'Connecting beyond borders',
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                )
        ));
    }
}
