<?php

namespace Database\Seeders;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Schedule-H', 'slug'=> 'Schedule-H', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Daily', 'slug'=> 'Daily', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dermatology', 'slug'=> 'Dermatology', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Essentials', 'slug'=> 'Essentials', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Schedule-G', 'slug'=> 'Schedule-G', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
