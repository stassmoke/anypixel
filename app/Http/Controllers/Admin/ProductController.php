<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class ProductController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.products.index');
    }
}
