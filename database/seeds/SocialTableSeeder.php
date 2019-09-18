<?php

use Illuminate\Database\Seeder;

class SocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $socials = [
            [
                'varName' => 'Instagram',
                'varIcon' => 'fa-instagram',
                'varLink' => 'https://www.instagram.com/',
            ],
            [
                'varName' => 'Facebook',
                'varIcon' => 'fa-facebook-square',
                'varLink' => 'http://facebook.com/',
            ],
            [
                'varName' => 'Telegram',
                'varIcon' => 'fa-telegram',
                'varLink' => 'https://telegram.org/',
            ],
            [
                'varName' => 'Youtube',
                'varIcon' => 'fa-youtube',
                'varLink' => 'https://www.youtube.com/',
            ],
            [
                'varName' => 'Linkedin',
                'varIcon' => 'fa-linkedin',
                'varLink' => 'https://www.linkedin.com/',
            ],
            [
                'varName' => 'Behance',
                'varIcon' => 'fa-behance-square',
                'varLink' => 'https://www.behance.net',
            ],
        ];

        foreach ($socials as $index => $social) {
            $socialModel = new \App\Models\Social();

            $socialModel->varName = $social['varName'];
            $socialModel->varIcon = $social['varIcon'];
            $socialModel->varLink = $social['varLink'];
            $socialModel->intSort = $index;

            $socialModel->save();
        }
    }
}
