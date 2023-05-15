<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\CustomerRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class CustomerController extends Controller
{
    public function login (){
        return view('customers.login');
    }

    public function google () {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback () {
        $callback = Socialite::driver('google')->stateless()->user();

        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        // $user = User::firstOrCreate([
        //     'email' => $data['email']
        // ], $data);

        $user = User::where('email', $data['email'])->first();
        if(!$user) {
            $user = User::create($data);
            Mail::to($user->email)->send(new CustomerRegistration($user));
        }

        Auth::login($user, true);

        return redirect(route('landing'));
    }
}
