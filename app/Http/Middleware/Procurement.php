<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-28
 * Time: 下午2:31
 */

namespace App\Http\Middleware;

//use Illuminate\Http\Request;
use Closure;
use App\Http\Controllers\CommonController as Func;
class Procurement
{
    public function handle($request, Closure $next)
    {

        $user = $request->session()->get('username');
        if(!isset($user)){
            Func::popup("您未登录或刚刚注销，请从首页登录！");
            Func::redirect("/procurement/login");
        }
        return $next($request);
    }

}