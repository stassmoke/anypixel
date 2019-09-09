<?php

use Illuminate\Database\Seeder;

class CounterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $counters = [
            [
                'varAlias' => \App\Models\Counter::COUNTRY_ALIAS,
                'varName' => 'Countries',
                'isEnabled' => true,
                'intValue' => 169,
            ],
            [
                'varAlias' => \App\Models\Counter::PROJECTS_ALIAS,
                'varName' => 'Templates',
                'isEnabled' => true,
                'intValue' => 0,
            ],
            [
                'varAlias' => \App\Models\Counter::FOLLOWERS_ALIAS,
                'varName' => 'Followers',
                'isEnabled' => true,
                'intValue' => 0,
            ],
            [
                'varAlias' => \App\Models\Counter::SALES_ALIAS,
                'varName' => 'Sales',
                'isEnabled' => true,
                'intValue' => 0,
            ],
        ];

        foreach ($counters as $index => $counter) {
            $counterModel = new \App\Models\Counter();

            $counterModel->varAlias = $counter['varAlias'];
            $counterModel->varName = $counter['varName'];
            $counterModel->isEnabled = $counter['isEnabled'];
            $counterModel->intValue = $counter['intValue'];
            $counterModel->intSort = $index;

            $counterModel->save();
        }
    }
}
