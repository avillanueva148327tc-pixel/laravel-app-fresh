<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Emails from session
        $emails = session('emails', []);
        // Users from DB
        $users = User::all();
        return view('dashboard', compact('emails', 'users'));
    }
}
