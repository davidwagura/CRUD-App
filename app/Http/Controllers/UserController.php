<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' =>$incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }
      
        return redirect ('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }


    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:15']
        ]);
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        
        $user = User::created($incomingFields);
        auth()->login($user);

        return redirect('/');
    }
}
