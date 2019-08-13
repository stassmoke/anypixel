<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            [
                'varName' => 'After Effects',
                'varLink' => 'after-effect',
                'intOrder' => 0,
                'isEnabled' => true,
            ],
            [
                'varName' => 'Premiere Pro',
                'varLink' => 'premiere-pro',
                'intOrder' => 1,
                'isEnabled' => true,
            ],
        ];

        foreach ($categories as $category) {
            $categoryModel = new \App\Models\Category();

            $categoryModel->varName = $category['varName'];
            $categoryModel->varLink = $category['varLink'];
            $categoryModel->intOrder = $category['intOrder'];
            $categoryModel->isEnabled = $category['isEnabled'];

            $categoryModel->save();
        }
    }
}
