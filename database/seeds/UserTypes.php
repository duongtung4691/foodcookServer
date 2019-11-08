<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            ['title'=>"manager"],
            ['title'=>"admin"],
            ['title'=>"sale"],
            ['title'=>"user"],
            ['title'=>"guest"],
            ['title'=>"marketing"],
            ['title'=>"ctv"],
        ]);
    }
}
