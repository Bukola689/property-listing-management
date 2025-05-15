<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\RegisterNotification;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use App\Events\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        //$users = User::first();

        $user = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required' 
        ]);

        $user = User::create([
            'name' => $request->name,
            'active' => true,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $when = Carbon::now()->addSeconds(10);

        $user->notify((new RegisterNotification($user))->delay($when));

        event(new UserRegistered($user));

        event(new Registered($user));

        $token  = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response, 201);
    }
}
