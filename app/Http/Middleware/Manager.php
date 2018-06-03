<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-15
 * Time: 下午10:27
 */

namespace App\Http\Middleware;
//use Illuminate\Http\Request;
use Closure;
use App\Http\Controllers\CommonController as Func;
class Manager {

    public function handle($request, Closure $next)
    {
        //session_start();

        $user = $request->session()->get('username');
        if(!isset($user)){
            Func::popup("您未登录或刚刚注销，请从首页登录！");
            Func::redirect("/manager/login");
        }
        return $next($request);
    }

}