<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>"duongtung",
            'email'=>'duongthanhtung.461991@gmail.com',
            'password'=>"duongtung",
            'phoneNumber'=>'0786783555'
        ]);
    }
}
