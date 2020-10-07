<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExperienciaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('experiencias')->insert([
            'experiencia' => '0 - 6 Meses',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '6 Meses - 1 Año',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '1 - 3 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '3 - 5 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '5 - 7 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '7 - 10 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '10 - 12 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('experiencias')->insert([
            'experiencia' => '12 - 15 Años',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
