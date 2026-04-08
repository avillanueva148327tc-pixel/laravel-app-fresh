<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// --- Phase 1: Navigation ---
Route::view('/', 'welcome')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/services', 'services')->name('services');
Route::view('/showcases', 'showcases')->name('showcases');
Route::view('/blog', 'blog')->name('blog');

// --- Phase 2 & 3: User Registration & Management ---
Route::get('/register', function () {
    return view('user_registration');
})->name('register');

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'nickname' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email',
        'age' => 'required|integer|min:1',
        'address' => 'required|string',
        'contact_number' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Fill the default 'name' field for compatibility
    $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
    $data['password'] = bcrypt($data['password']);

    User::create($data);

    return redirect()->route('dashboard')->with('success', 'User registered successfully!');
})->name('users.store');

Route::get('/dashboard', function () {
    $users = User::all();
    return view('dashboard', compact('users'));
})->name('dashboard');

Route::delete('/users/{user}', function (User $user) {
    $user->delete();
    return back()->with('success', 'User deleted successfully.');
})->name('users.destroy');

// Edit and Update routes could be added here as well for full CRUD
