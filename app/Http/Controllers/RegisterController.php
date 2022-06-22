<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function registration() {
        return view('registration');
    }

    public function registration_post(Request $request) {
        $role_obj = new Role();
        $roles = $role_obj->all();
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
        foreach ($roles as $user) {
            if ($user->login === $login) {
                array_push($errors, 'there is user with ur login');
            }
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
            $role_id = DB::table('roles')->latest('updated_at')->first();
            DB::table('role_worker')->insert([
                [
                    'role_id' => $role_id->id,
                    'worker_id' => 1,
                    "created_at" =>  Carbon::now(), # new \Datetime()
                    "updated_at" => Carbon::now(),  # new \Datetime()
                ],
            ]);
            setcookie('login', $login, 0, '/');
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
