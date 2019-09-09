<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class SocialsController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.socials.index');
    }
}
