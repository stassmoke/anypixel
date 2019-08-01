<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.categories.index');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * @param int $intCatID
     * @return View
     */
    public function edit(int $intCatID): View
    {
        return view('admin.categories.edit', [
            'intCatID' => $intCatID,
        ]);
    }
}
