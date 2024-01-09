<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = ['html','css','js','vue.js','php','laravel'];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type
            ]);
            
        }
    }
}
