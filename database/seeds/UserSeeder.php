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
            [
                'name' => "duongtung",
                'email' => 'duongthanhtung.461991@gmail.com',
                'password' => Hash::make("duongtung"),
                'phoneNumber' => '0786783555',
                'idType' => 1
            ],
            [
                'name' => "duongtung1",
                'email' => 'duongthanhtung.461991@gmail.com',
                'password' => Hash::make("duongtung"),
                'phoneNumber' => '0786783558',
                'idType' => 2
            ],
            [
                'name' => "duongtung2",
                'email' => 'duongthanhtung.461991@gmail.com',
                'password' => Hash::make("duongtung"),
                'phoneNumber' => '0786783556',
                'idType' => 3
            ],
            [
                'name' => "duongtung2",
                'email' => 'duongthanhtung.461991@gmail.com',
                'password' => Hash::make("duongtung"),
                'phoneNumber' => '0786783550',
                'idType' => 4
            ]
        ]);
    }
}
