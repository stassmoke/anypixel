<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class HomepageInfoController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.homepage_info.index');
    }
}
