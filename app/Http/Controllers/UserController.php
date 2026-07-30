<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response {
        $users = User::select('id', 'name', 'email', 'email_verified_at', 'created_at')
        ->latest()
        ->get();
        
        return inertia('Users/Index', [
            'users' => $users,
        ]);
    }
}
