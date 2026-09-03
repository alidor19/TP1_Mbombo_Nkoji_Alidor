<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Language;
use App\Http\Resources\UserResource;
use App\Http\Resources\LanguageResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
            'email' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::create($validated);

        return new UserResource($user);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
            'email' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::find($id);

        $user->update($validated);

        return new UserResource($user);
    }
}