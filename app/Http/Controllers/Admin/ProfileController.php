<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('admin.profile.edit', compact('user'));
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = $request->user();
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $user->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
