<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alfonso Iván Rodríguez Pienda',
            'email' => 'poncho@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('P0nch$95%'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Erika Noemi Galicia Gutierrez',
            'email' => 'erika@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('erika123!'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
