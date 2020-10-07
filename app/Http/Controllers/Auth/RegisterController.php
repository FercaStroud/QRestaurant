<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|string|max:191',
            'restaurant_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'user_name' => $data['user_name'],
            'restaurant_name' => $data['restaurant_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'state' => $data['state'],
            'type_id' => 2,
            'password' => bcrypt($data['password']),
        ]);

        self::sendEmailOnCreatedUser($user);

        return $user;
    }

    public function sendEmailOnCreatedUser(&$user)
    {
        $to_name = $user->user_name;
        $to_email = $user->email;

        $data = [
            'name' => $user->user_name,
            'email' => $user->email
        ];

        Mail::send("emails.createUser", $data,
            function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject("¡Gracias por registrarte en Q-Restaurant!");
                $message->from(getenv("MAIL_FROM_ADDRESS"), "Q-Restaurant");
                $message->cc(getenv("MAIL_FROM_ADDRESS"), "Q-Restaurant");
            }
        );
    }

}
