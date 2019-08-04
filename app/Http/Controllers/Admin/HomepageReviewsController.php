<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class HomepageReviewsController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.homepage_reviews.index');
    }

    /**
     * @param int $intReviewID
     * @return View
     */
    public function edit(int $intReviewID): View
    {
        return view('admin.homepage_reviews.edit', [
            'intReviewID' => $intReviewID,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.homepage_reviews.create');
    }
}
