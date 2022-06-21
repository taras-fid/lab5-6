<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function registration() {
        return view('registration');
    }

    public function registration_error($errors) {
        return view('registration', ['errors' => $errors]);
    }

    public function registration_post(Request $request) {
        $worker = new Worker();
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
            DB::table('roles')->insert([
                [
                    'login' => $login,
                    'password' => $password,
                    "created_at" =>  Carbon::now(), # new \Datetime()
                    "updated_at" => Carbon::now(),  # new \Datetime()
                ],
            ]);
            DB::table('workers')->insert([
                [
                    'name' => '',
                    'position' => 1,
                    "created_at" =>  Carbon::now(), # new \Datetime()
                    "updated_at" => Carbon::now(),  # new \Datetime()
                ],
            ]);
            return view('welcome', [
                'user' => $user
            ]);
        }
        else {
            return view('registration', ['errors' => $errors]);
            //return redirect()->route('/registration');
        }
    }
}
