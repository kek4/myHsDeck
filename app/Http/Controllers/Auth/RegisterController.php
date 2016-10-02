<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Notifications\RegisteredUser;


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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Override register to dont let user login without validate email.
     * Send an notify to new user and redirect to login
     */
    public function register(Request $request)
   {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $user->notify(new RegisteredUser());

        return redirect('login')->with('success',"Votre compte à bien été créer. Veuillez le confirmer avec l'email de validation qui vient de vous être envoyé");
    }

    /**
     * Confirm an email adress by updating confirmation_token to null if id and token are matching
     * Else redirect to login with error message
     */
    public function confirm($id, $token){

      $user = User::where('id', $id)->where('confirmation_token', $token)->first();
      if ($user) {
         $user->update(['confirmation_token' => null]);
         $this->guard()->login($user);
         return redirect($this->redirectPath())->with('success', 'Votre compte à bien été confirmé.');
      }else{
         redirect('/login')->with('error','Ce lien ne semble pas valide.');
      }
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => str_replace('/', '', bcrypt(str_random(16)))
        ]);
    }
}
