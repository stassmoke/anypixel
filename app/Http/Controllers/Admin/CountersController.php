<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class CountersController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.counters.index');
    }
}
