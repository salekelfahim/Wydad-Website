<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompititionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compititions')->insert([
            ['compitition' => 'Botola'],
            ['compitition' => 'Throne Cup'],
            ['compitition' => 'Arab Cup'],
            ['compitition' => 'CAF Champions League'],
            ['compitition' => 'African Confederation Cup'],
            ['compitition' => 'African Super Cup'],
            ['compitition' => 'African Football League'],
            ['compitition' => 'FIFA Club World Cup'],
        ]);
    }
}
