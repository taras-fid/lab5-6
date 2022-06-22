<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Worker;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {
        $role = null;
        if(isset($_COOKIE['login'])) {
            $role_obj = new Role();
            $roles = $role_obj->all();
            error_log("{$_COOKIE['login']}");
            foreach ($roles as $item) {
                if($item->login == $_COOKIE['login']) {
                    error_log("{$item->login}");
                    foreach ($item->workers as $worker) {
                        $role = $worker->position;
                    }
                }
            }
            return view('about', ['role'=>$role]);
        }
        else {
            return view('about', ['role'=>null]);
        }
    }

    public function about_active($table_num) {
        if($table_num == 3) {
            $worker = Worker::all();
            return view('main', ['worker'=>$worker], ['table_num'=>$table_num]);
        }
        elseif($table_num == 2) {
            $worker = Worker::find($table_num);
            return view('main', ['worker'=>$worker], ['table_num'=>$table_num]);
        }
        elseif($table_num == 1) {
            $worker = Worker::find($table_num);
//            $type = gettype($worker);
//            error_log("{$type}");
            return view('main', ['worker'=>$worker], ['table_num'=>$table_num]);
        }
        else {
            if(isset($_COOKIE['login'])) {
                unset($_COOKIE['login']);
                setcookie('login', null, -1, "/");
            }
            echo 'out page';
            return view('main');
        }
    }
}
