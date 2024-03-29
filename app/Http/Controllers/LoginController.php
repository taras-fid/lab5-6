<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login() {
        return view('registration');
    }

    public function login_post(Request $request) {
        $login = $request -> input('login');
        $password = $request -> input('password');
        $errors = array();
        if(!$login) {
            array_push($errors, 'login is empty');
        }
        if (!$password) {
            array_push($errors, 'password is empty');
        }
        $user = new Role;
        $all_users = $user->all();
        $workers = new Worker();
        $all_roles = $workers->all();
        foreach ($all_users as $user) {
            if($user->login === $login) {
                if($user->password === $password) {
                    $role = 3;
                    setcookie('login', $login, 0, '/');
                    return view('about', ['user'=>$user], ['role'=>$role]);
                }
                else {
                    array_push($errors, 'false password');
                    return view('login', ['errors' => $errors]);
                }
            }
        }
        array_push($errors, 'no user with this login');
        return view('login', ['errors' => $errors]);
    }
}
