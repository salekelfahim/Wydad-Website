<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('missions')->insert([
            ['mission' => 'Manager'],
            ['mission' => 'The Assistant Manager'],
            ['mission' => 'The Goalkeeping Coach'],
            ['mission' => 'Fitness Coach'],
            ['mission' => 'Docteur'],
            ['mission' => 'President'],
        ]);
    }
}
