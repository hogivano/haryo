<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    //
    public function login(Request $req){
        $message = [
            'usrmail.required'    => 'username/email harus diisi',
            'password.required' => 'password harus diisi',
        ];
        $rules = [
            'usrmail' => 'required',
            'password' => [
                'required',
            ],
        ];

        $validator = $this->validator($req->all(), $rules, $message);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if (filter_var($req->usrmail, FILTER_VALIDATE_EMAIL)){
            $user = User::where('email', $req->usrmail)->first();
        } else {
            $user = User::where('username', $req->usrmail)->first();
        }

        if (!empty($user)){
            if (Hash::check($req->password, $user->password)){
                Auth::guard('admin')->attempt(['email' => $user->email, 'username' => $user->username, 'password' => $req->password]);
                return redirect()->route('admin.dashboard');
            } else {
                $errors = [
                    'usrmail' => 'Username/email atau password yang anda masukan salah'
                ];

                return Redirect::back()->withInput()->withErrors($errors);
            }
        } else {
            $errors = [
                'usrmail' => 'Username/email atau password yang anda masukan salah'
            ];

            return Redirect::back()->withInput()->withErrors($errors);
        }
    }

    public function register(Request $req){
        $message = [
            'nama.required' => 'nama harus diisi',
            'nama.min' => 'nama minimal 3 karakter',
            'username.required' => 'username harus diisi',
            'username.min' => 'username minimal 3 karakter',
            'email.required' => 'email harus diisi',
            'email.min' => 'email minimal 4 karakter',
            'email.email' => 'format email salah (example@example.com)',
            'email.unique' => 'email sudah terdaftar',
            'password.required' => 'password harus diisi',
            'password.min' => 'password minimal 5 karakter',
        ];
        $rules = [
            'nama' => 'required|min:3',
            'username' =>'required|min:3',
            'email' => 'required|min:4|email|unique:users',
            'password' => [
                'required',
                'min:5'
            ],
        ];
        $validator = $this->validator($req->all(), $rules, $message);
        if ($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }

        User::create([
            'nama' => $req->nama,
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        return redirect()->route('login');
    }

    public function validator($data, $rules, $message){
        return Validator::make($data, $rules, $message);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }
}
