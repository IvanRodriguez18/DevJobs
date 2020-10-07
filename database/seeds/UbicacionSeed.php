<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ubicacions')->insert([
            'ubicacion' => 'Remoto',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Estados Unidos',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Canada',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Ciudad de México',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Colombia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'España',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Argentina',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Chile',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ubicacions')->insert([
            'ubicacion' => 'Perú',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
