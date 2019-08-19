<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         $this->call(CategoriesTableSeeder::class);
         $this->call(HomepageReviewTableSeeder::class);
         $this->call(CounterTableSeeder::class);
    }
}
