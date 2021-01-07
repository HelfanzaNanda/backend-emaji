<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

interface UserInterface {
    public function login($auth);
    public function all();
    public function store(array $data);
    public function update(array $data, $user);
    public function delete($user);
    public function show($user);
}

class UserRepository implements UserInterface {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($auth)
    {

    }

    public function all()
    {
        return $this->user->all();
    }

    public function store(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make(12345678),
            'role' => $data['role'],
        ]);
    }

    public function update(array $data, $user)
    {
        return $user->update([
            'name' => $data['name'] ?? $user->name,
            //'email' => $data['email'] ?? $user,
            'password' => Hash::make(12345678),
            'role' => $data['role'] ?? $user->role,
        ]);
    }

    public function delete($user)
    {
        return $user->delete();
    }

    public function show($user)
    {
        return $user;
    }
}
