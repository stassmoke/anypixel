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

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * @param int $intProductID
     * @return View
     */
    public function edit(int $intProductID): View
    {
        return view('admin.products.edit', [
            'intProductID' => $intProductID,
        ]);
    }
}
