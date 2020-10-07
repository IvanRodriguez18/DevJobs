<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'categoria' => 'FrontEnd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'BackEnd',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Full Stack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Big Data',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Data Science',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'QA Tester',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'DBA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'DevOps',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'UI/UX',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'TeachLead',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Proyect Manager',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categorias')->insert([
            'categoria' => 'Business Intelligence',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
