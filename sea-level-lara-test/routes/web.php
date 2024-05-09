<?php

 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/setup', function () {

    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password',
    ];
    if (!Auth::attempt($credentials)) {
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            return [
                'admin' => $adminToken->plainTextToken,
            ];
        }
    }
 });
