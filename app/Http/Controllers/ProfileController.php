<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
{
    $pdo = DB::connection()->getPdo();

    $stmt = $pdo->prepare(
        'SELECT
            profiles.id,
            profiles.full_name,
            profiles.phone,
            profiles.address,
            profiles.created_at,
            users.name AS created_by
         FROM profiles
         INNER JOIN users ON users.id = profiles.user_id
         ORDER BY profiles.created_at DESC'
    );

    $stmt->execute();

    $profiles = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    return view('dashboard', [
        'profiles' => $profiles,
    ]);
}

public function create()
{
    return view('profiles.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'full_name' => ['required', 'string', 'max:100'],
        'phone' => ['nullable', 'string', 'max:30'],
        'address' => ['nullable', 'string', 'max:500'],
    ]);

    $pdo = DB::connection()->getPdo();

    $stmt = $pdo->prepare(
        'INSERT INTO profiles
            (user_id, full_name, phone, address, created_at, updated_at)
         VALUES
            (:user_id, :full_name, :phone, :address, NOW(), NOW())'
    );

    $stmt->execute([
        'user_id' => session('user_id'),
        'full_name' => $validated['full_name'],
        'phone' => $validated['phone'] ?? null,
        'address' => $validated['address'] ?? null,
    ]);

    return redirect('/dashboard')
        ->with('success', 'Profile created successfully.');
}

public function edit($id)
{
    $pdo = DB::connection()->getPdo();

    $stmt = $pdo->prepare(
        'SELECT id, full_name, phone, address
         FROM profiles
         WHERE id = :id
         AND user_id = :user_id
         LIMIT 1'
    );

    $stmt->execute([
        'id' => $id,
        'user_id' => session('user_id'),
    ]);

    $profile = $stmt->fetch(\PDO::FETCH_ASSOC);

    if (!$profile) {
        abort(404);
    }

    return view('profiles.edit', [
        'profile' => $profile,
    ]);
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'full_name' => ['required', 'string', 'max:100'],
        'phone' => ['nullable', 'string', 'max:30'],
        'address' => ['nullable', 'string', 'max:500'],
    ]);

    $pdo = DB::connection()->getPdo();

    $stmt = $pdo->prepare(
    'UPDATE profiles
     SET full_name = :full_name,
         phone = :phone,
         address = :address,
         updated_at = NOW()
     WHERE id = :id
     AND user_id = :user_id'
);

    $stmt->execute([
        'id' => $id,
        'user_id' => session('user_id'),
        'full_name' => $validated['full_name'],
        'phone' => $validated['phone'] ?? null,
        'address' => $validated['address'] ?? null,
    ]);

    return redirect('/dashboard')
        ->with('success', 'Profile updated successfully.');
}

public function destroy($id)
{
    $pdo = DB::connection()->getPdo();

    $stmt = $pdo->prepare(
        'DELETE FROM profiles
         WHERE id = :id
         AND user_id = :user_id'
    );

    $stmt->execute([
        'id' => $id,
        'user_id' => session('user_id'),
    ]);

    return redirect('/dashboard')
        ->with('success', 'Profile deleted successfully.');
}
}
