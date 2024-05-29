<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Mail;
use App\VerifyMail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\NewUserNotification;



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
    // protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


   $user =    User::create([
           
            'name' => $data['name'],
            'username' =>$data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' =>  $data['dob'],
            'is_emp' => 0,
   
        ]);



$data = [
             'name'          => $user->name,
  ];


   Mail::send('emails.verify_mail', $data, function($message) use ($user){
   $message->to($user->email, '')->cc(['grishav@kodegurus.com']);
                  $message->from('hr@kodegurus.com', 'Kodegurus HR');
                  $message->subject('Register verify mail');
                  });

 $user->notify(new NewUserNotification($user)); 
        return Redirect::to('/register');

    }
}
