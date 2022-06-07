<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function registration() {
        return view('registration');
    }

    public function registration_error($errors) {
        return view('registration', ['errors' => $errors]);
    }

    public function registration_post(Request $request) {
        $login = $request -> input('login');
        $password = $request -> input('password');
        $rep_password = $request -> input('rep_password');
        $user = [
            'login' => $login,
            'password' => $password,
        ];
        $errors = array();
        if(!$login) {
            array_push($errors, 'login is empty');
        }
        if (!$password || !$rep_password) {
            array_push($errors, 'password is empty');
        }
        if ($password !== $rep_password) {
            array_push($errors, 'pass != rep_pass');
        }
        if (count($errors) === 0) {
            return view('welcome', [
                'user' => $user
            ]);
        }
        else {
            return view('registration', ['errors' => $errors]);
            //return redirect()->route('/registration', $errors);
        }
    }
}
