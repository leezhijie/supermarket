<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-28
 * Time: 下午2:36
 */

namespace App\Http\Controllers\procurement;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController as Func;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class IndexController extends Controller{

    public function Message(){
        $message = DB::select('select * from message WHERE read_id = 1');

        for($i = 0; $i < count($message); $i++) {
            $name = DB::select('select name, number from goods WHERE id = ?', [$message[0]->goods_id]);
            $message[$i] ->name = $name[0]->name;
            $message[$i] ->number = $name[0]->number;
        }
        return view('procurement/message',
            ['message' => $message]);
    }

    /**
     * 商品进货
     * @param Request $request
     * @param $goods_id
     */
    public function insert(Request $request, $tid,$goods_id) {
        $number = DB::select('select * from message WHERE goods_id = ?', [$goods_id]);
        if(count($number)) {
            $is_success = DB::update('update message set read_id = ? WHERE goods_id = ?', [0, $goods_id]);
        }
        $number = $request->input('number');
        $num = DB::select('select number from goods WHERE id = ?', [$goods_id]);
        $is_success = DB::update('update goods set number = ? WHERE id = ?', [$num[0]->number + $number, $goods_id]);
        Func::alert('进货成功');
        if($tid == 1) {
            Func::redirect('/procurement/index/1');
        }else{
            Func::redirect('/procurement/message');
        }

    }

    public function index($page){
            $infor = DB::select('select * from goods WHERE sold_out_id = 1 ORDER BY number');
            $allNum = intval((count($infor) / 10) + 1);
            $infor = array_slice($infor, 10 * ($page - 1), 10);

        return view('procurement/index', [
            'infor' => $infor,
            'home' => '/procurement/index/',
            'total' => $allNum,
            'current' => $page,
        ]);

    }


}