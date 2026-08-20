<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Server-side validation
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $pdo = DB::connection()->getPdo();

        // Check if email already exists
        $stmt = $pdo->prepare(
            'SELECT id FROM users WHERE email = :email LIMIT 1'
        );

        $stmt->execute([
            'email' => $validated['email'],
        ]);

        if ($stmt->fetch()) {
            return back()
                ->withInput($request->except('password', 'password_confirmation'))
                ->withErrors([
                    'email' => 'This email is already registered.',
                ]);
        }

        // Securely hash the password
        $hashedPassword = password_hash(
            $validated['password'],
            PASSWORD_DEFAULT
        );

        // Insert using a prepared statement
        $stmt = $pdo->prepare(
            'INSERT INTO users (name, email, password, created_at, updated_at)
             VALUES (:name, :email, :password, NOW(), NOW())'
        );

        $stmt->execute([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $hashedPassword,
        ]);

        return redirect('/login')
            ->with('success', 'Registration successful. Please log in.');
    }

    public function login(Request $request)
{
    // Server-side validation
    $validated = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    $pdo = DB::connection()->getPdo();

    // Retrieve user using a prepared statement
    $stmt = $pdo->prepare(
        'SELECT id, name, email, password
         FROM users
         WHERE email = :email
         LIMIT 1'
    );

    $stmt->execute([
        'email' => $validated['email'],
    ]);

    $user = $stmt->fetch(\PDO::FETCH_ASSOC);

    // Verify credentials
    if (!$user || !password_verify($validated['password'], $user['password'])) {
        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Invalid email or password.',
            ]);
    }

    // Prevent session fixation
    $request->session()->regenerate();

    // Store authenticated user in session
    $request->session()->put('user_id', $user['id']);
    $request->session()->put('user_name', $user['name']);
    $request->session()->put('last_activity', time());

    return redirect('/dashboard');
}
}