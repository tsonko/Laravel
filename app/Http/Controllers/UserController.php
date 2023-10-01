<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function register(request $request) {
       $formData = $request->validate([
           'name'=>['required','min:3'],
           'email'=>['required','email',Rule::unique('users','email')],
           'address'=>['required'],
           'password'=>['required','min:6'],
       ]);

       $formData['password'] = bcrypt($formData['password']);

       $user = User::create($formData);
       auth()->login($user);

       return redirect('./');
   }

   public function login(request $request) {
       $formData = $request->validate([
           'email'=>['required'],
           'password'=>['required'],
       ]);

       if(auth()->attempt(['email'=>$formData['email'],'password'=>$formData['password']])) {
           $request->session()->regenerate();
       }

       return redirect('./trucks');

   }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
