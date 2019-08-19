<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class SubscribersController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.subscribers.index');
    }
}
