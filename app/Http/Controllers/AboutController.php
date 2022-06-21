<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {
        return view('about');
    }

    public function about_active($table_num) {
        if($table_num === 3) {
            echo '3 table';
            return view('main');
        }
        elseif($table_num === 2) {
            echo '2 table';
            return view('main');
        }
        elseif($table_num === 1) {
            echo '1 table';
            return view('main');
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
