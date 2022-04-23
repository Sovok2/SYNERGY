<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexForm()
    {
        return view('cabinet.index');
    }

    public function edit()
    {
        $user = auth('web')->user();
        return view('cabinet.edit', compact('user'));
    }

    public function update(UpdateFormRequest $request)
    {
        $data = $request->validated();

        /**
         * @var App\Models\User $user
         */
        $user = auth('web')->user();
        $user->update($data);

        return redirect()->route('cabinet.index-form');
    }
}
