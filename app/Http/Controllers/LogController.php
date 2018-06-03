<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-15
 * Time: 下午10:09
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\CommonController as Func;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class LogController extends Controller
{

    public function manager(Request $request)
    {
        $username = $request->input('user');
        $password = $request->input('password');
        if (($username != "") && ($password != "")) {
            $user = DB::select("select * from user WHERE uid = 1 and user_name = '$username' limit 1");
            if (count($user) == 1) {
                if ($user[0]->password == md5($password)) {
                    $request->session()->put('username', $username);
                    return view('manager/home');
//                    Func::redirect('/manager/1/1');
                } else {
                    Func::alert("帐号、帐号类型或密码不正确，请重新输入！");
                    Func::goBack();
                    exit;
                }
            } else {
                Func::alert("帐号、帐号类型或密码不正确，请重新输入！");
                Func::goBack();
                exit;
            }
        } else {
            Func::alert("请输入用户名和密码");
            Func::goBack();
            exit;
        }
    }

    public function procurement(Request $request)
    {
        $username = $request->input('user');
        $password = $request->input('password');
        if (($username != "") && ($password != "")) {
            $user = DB::select("select * from user WHERE uid = 3 and user_name = '$username' limit 1");
            if (count($user) == 1) {
                if ($user[0]->password == md5($password)) {
                    $request->session()->put('username', $username);
                    return view('procurement/home');
//                    Func::redirect('/manager/1/1');
                } else {
                    Func::alert("帐号、帐号类型或密码不正确，请重新输入！");
                    Func::goBack();
                    exit;
                }
            } else {
                Func::alert("帐号、帐号类型或密码不正确，请重新输入！");
                Func::goBack();
                exit;
            }
        } else {
            Func::alert("请输入用户名和密码");
            Func::goBack();
            exit;
        }
    }

    public function insert(){
        $user_name = "manager";
        $password = "123456";
        $password= md5($password);
        $is_success = DB::insert('insert into user (id, uid, user_name, password) VALUES(?,?,?,?)',
            [1, 1, $user_name, $password]);

        $user_name = "management";
        $password = "123456";
        $password= md5($password);
        $is_success = DB::insert('insert into user (id, uid, user_name, password) VALUES(?,?,?,?)',
            [2, 2, $user_name, $password]);
        $user_name = "procurement";
        $password = "123456";
        $password= md5($password);
        $is_success = DB::insert('insert into user (id, uid, user_name, password) VALUES(?,?,?,?)',
            [3, 3, $user_name, $password]);
        dd("nimei");
    }
}