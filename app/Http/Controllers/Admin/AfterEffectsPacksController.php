<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class AfterEffectsPacksController
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.ae.index');
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return \view('admin.ae.create');
    }

    /**
     * @param int $intPackID
     * @return View
     */
    public function edit(int $intPackID): View
    {
        return \view('admin.ae.edit', [
            'intPackID' => $intPackID,
        ]);
    }
}
