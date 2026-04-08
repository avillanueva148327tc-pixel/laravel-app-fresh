<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show registration form
    public function create()
    {
        return view('user_registration');
    }

    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'middle_name'     => 'nullable|string|max:255',
            'last_name'       => 'nullable|string|max:255',
            'nickname'        => 'nullable|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'age'             => 'nullable|integer|min:0',
            'address'         => 'nullable|string',
            'contact_number'  => 'nullable|string',
            'password'        => 'required|min:8|confirmed',
        ]);

        User::create($validated);

        return redirect()->route('users.index')
                         ->with('success', 'User created successfully.');
    }

    // List all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show edit form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'            => 'sometimes|required|string|max:255',
            'middle_name'     => 'nullable|string|max:255',
            'last_name'       => 'nullable|string|max:255',
            'nickname'        => 'nullable|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'age'             => 'nullable|integer|min:0',
            'address'         => 'nullable|string',
            'contact_number'  => 'nullable|string',
            'password'        => 'nullable|min:8|confirmed',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')
                         ->with('success', 'User updated.');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User removed.');
    }
}
