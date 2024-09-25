<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function goLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('voyage.index'));
        };

        return to_route('login')->withErrors([
            'email' => 'Identifiants incorrects'
        ])->onlyInput('email');

    }

    public function register()
    {
        return view('auth.register');
    }

    public function goRegister(RegisterRequest $request)
    {
        $role = Role::firstOrCreate(['name' => 'user']);
        $permission = Permission::firstOrCreate(['name' => 'all']);
        if (!$role->hasPermissionTo($permission)) {
            $role->givePermissionTo($permission);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $assignRole = $user->assignRole('user');
        return redirect()->route('voyage.index')->with('success', 'Inscription réussie, vous pouvez vous connecter.');

    }
}
