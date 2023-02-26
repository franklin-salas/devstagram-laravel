<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    

    public function index()
    {
        return view('auth.register');
    }
    
    public function store( Request $req)
    {
        $req->request->add(['username' => Str::slug($req->username) ]);
        $this->validate($req ,[
            'name' => 'required| min:3 | max:30',
            'username' =>'required|unique:users| min:3 | max:30',
            'email' =>'required| email| max:30 | unique:users',
            'password' =>'required |min:6| confirmed ',
        ]);

     
        User::Create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'password' => bcrypt( $req->password)
        ]);

        // auth()->attempt([
        // 'email' => $req->email,
        // 'password' =>$req->password
        // ]);
// otra formam
auth()->attempt($req->only('email','password'));

        return redirect()->route('post.index', auth()->user());
    }
}
