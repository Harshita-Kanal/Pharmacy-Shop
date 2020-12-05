<?php

namespace Database\Seeders;
use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      
        Medicine::create([
            'name' => 'amoxify',
            'slug' => 'amoxify',
            'details' => 'schedule-h',
            'price' => 30,
            'supplier' => 'Pharmwell',
           
        ])->categories()->attach(1);
    }
}
