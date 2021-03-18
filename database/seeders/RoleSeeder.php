<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'user',
            'slug' => 'user',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name' => 'guest',
            'slug' => 'guest',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
