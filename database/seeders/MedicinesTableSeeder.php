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
            'name' => 'Vaseline',
            'slug' => 'Vaseline',
            'details' => 'A cold cream',
            'price' => 30,
            'supplier' => 'Sanofi',
           
        ]);
        Medicine::create([
            'name' => 'Crocin',
            'slug' => 'Crocin',
            'details' => 'For Mild Fever',
            'price' => 30,
            'supplier' => 'Pharmwell',
           
        ]);
    }
}
