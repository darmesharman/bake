<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function update(Request $request, UpdateUserPassword $updater)
    {
        $updater->update($request->user(), $request->all());

        return back();
    }
}
