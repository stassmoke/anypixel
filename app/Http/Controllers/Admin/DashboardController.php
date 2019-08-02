<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;

class DashboardController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.dashboard');
    }
}
