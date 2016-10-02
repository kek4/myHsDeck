<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Socialite;
use Auth;

class FacebookAuthController extends Controller
{

   /**
    * Redirect the user to the Facebook authentication page.
    *
    * @return Response
    */
   public function redirect()
   {
      return Socialite::driver('facebook')->redirect();
   }

   /**
    * Find user information from FacebookAuthController
    *
    * @return Response
    */
   public function callback()
   {
      try {
          $providerUser = \Socialite::driver('facebook')->user();
      } catch (Exception $e) {
          return redirect('/facebook');
      }

      $authUser = $this->findOrCreateUser($providerUser);

      Auth::login($authUser, true);

      return view('home')->with('success', 'Votre compte à bien été crée avec votre Facebook.');

   }

   /**
    * Return User if exist. Create and return if notify
    *
    * @param $facebookUser
    * @return User
    */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('email', $facebookUser->email)->first();

        if ($authUser){
             $authUser->name = $facebookUser->name;
             $authUser->avatar = $facebookUser->avatar;
             $authUser->save();
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'password' => bcrypt($facebookUser->id),
            'email' => $facebookUser->email,
            'avatar' => $facebookUser->avatar
        ]);
    }
}
