<?php

use Illuminate\Database\Seeder;

class HomepageReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $reviews = [
            [
                'varName' => 'Jhon Doe',
                'varLink' => '#',
                'varText' => ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.',
                'varPosition' => 'Java Developer',
                'intOrder' => 1,
                'isEnabled' => true,
            ],
            [
                'varName' => 'Jhon Doe',
                'varLink' => '#',
                'varText' => ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.',
                'varPosition' => 'Java Developer',
                'intOrder' => 2,
                'isEnabled' => true,
            ],
            [
                'varName' => 'Jhon Doe',
                'varLink' => '#',
                'varText' => ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.',
                'varPosition' => 'Java Developer',
                'intOrder' => 3,
                'isEnabled' => true,
            ],
            [
                'varName' => 'Jhon Doe',
                'varLink' => '#',
                'varText' => ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled.',
                'varPosition' => 'Java Developer',
                'intOrder' => 4,
                'isEnabled' => true,
            ],
        ];

        foreach ($reviews as $review) {
            $reviewModel = new \App\Models\HomepageReview();

            $reviewModel->varName = $review['varName'];
            $reviewModel->varLink = $review['varLink'];
            $reviewModel->varText = $review['varText'];
            $reviewModel->varPosition = $review['varPosition'];
            $reviewModel->intOrder = $review['intOrder'];
            $reviewModel->isEnabled = $review['isEnabled'];

            $reviewModel->save();
        }
    }
}
