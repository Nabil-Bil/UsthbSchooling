<?php

namespace Database\Seeders;

use App\Models\Enseignants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name'=>'directriceDP',
            'password'=>'directriceDP'
        ]);

        DB::table('users')->insert([
            'name'=>'scolarité',
            'password'=>'scolarité'
        ]);

        \App\Models\Enseignant::factory(5)->create();

        

    }
}
