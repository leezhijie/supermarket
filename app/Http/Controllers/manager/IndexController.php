<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-8
 * Time: 上午9:06
 */

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController as Func;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
class IndexController extends Controller {

    /**浏览商品的主页
     * @param $id
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($tid, $page){
        if($tid == 1) {
            $infor = DB::select('select * from goods WHERE sold_out_id = 1 AND tid = 1 ORDER BY id');
            $goods = "衣服信息";
            $allNum = intval((count($infor) / 10) + 1);
            $infor = array_slice($infor, 10 * ($page - 1), 10);
        }
        if($tid == 2) {
            $infor = DB::select('select * from goods WHERE sold_out_id = 1 AND tid = 2 ORDER BY id');
            $goods = "食品信息";
            $allNum = intval((count($infor) / 10) + 1);
            $infor = array_slice($infor, 10 * ($page - 1), 10);
        }

        return view('manager/index', [
            'tid' => $tid,
            'goods' => $goods,
            'infor' => $infor,
            'home' => '/manager/'.$tid.'/',
            'total' => $allNum,
            'current' => $page,
        ]);
    }

    /**
     * 管理员搜索部分
     * @param $tid
     * @param $page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($tid, $page, Request $request) {
        $field = $request->input('value');
        $name = $request->input('title');
        if($field){
            if ($tid == 1) {
                $infor = DB::select("select * from goods WHERE $field LIKE '%$name%' AND tid = 1 ORDER BY id");
                $goods = "衣服信息";
                $allNum = intval((count($infor) / 10) + 1);
                $infor = array_slice($infor, 10 * ($page - 1), 10);
            } else{
                $infor = DB::select("select * from goods WHERE $field LIKE '%$name%' and tid = 2 ORDER BY id");
                $goods = "食物信息";
                $allNum = intval((count($infor) / 10) + 1);
                $infor = array_slice($infor, 10 * ($page - 1), 10);
            }
            return view('manager/index', [
                'tid' => $tid,
                'goods' => $goods,
                'infor' => $infor,
                'home' => '/manager/'.$tid.'/search/'.$page,
                'total' => $allNum,
                'current' => $page,
            ]);
        }else {
            Func::alert('请选择搜索类型');
            Func::goBack();
        }
    }

    /**
     * 返回删除的原因的页面(ok)
     * @param $tid
     * @param $page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sold_out($tid, $page, $id) {
        return view('manager/sold_out',[
            'tid' => $tid,
            'page' => $page,
            'id' => $id
        ]);
    }

    /**
     * 添加下架的原因(ok)
     * @param Request $request
     * @param $tid
     * @param $page
     * @param $id
     */
    public function addReason(Request $request, $tid, $page, $id) {
        $reason = $request->input('content');
        $date = time();
        $is_success = DB::update('update goods set sold_out_id = ? and sold_out_reasion = ? and sold_out_date = ? where id = ?',
            [0, $reason, $date, $id]);
        Func::alert('原因发表成功');
        Func::redirect('/manager/'.$tid.'/'.$page);
    }

    /**
     * 销量查看
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function count($page) {
        $sell = DB::select('select * from sell ORDER BY date DESC');
        $allNum = intval((count($sell) / 10) + 1);
        $sell = array_slice($sell, 10 * ($page - 1), 10);
        for($i = 0; $i < count($sell); $i++) {
            $infor = DB::select('select name from goods WHERE id = ?', [$sell[$i]->id]);
            $sell[$i]->name = $infor[0]->name;
        }
        return view('manager/sell', [
            'sell' => $sell,
            'home' => '/manager/count/',
            'current' => $page,
            'total' => $allNum,
        ]);
    }

    /**
     * 销量搜索
     * @param $page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function count_search($page, Request $request) {
        if(is_null($request->input('start_date'))){
            $start_date = '2000-01-01';
        } else {
            $start_date = $request->input('start_date');
        }
        if(is_null($request->input('end_date'))){
            $end_date = date(time());
        } else {
            $end_date = $request->input('end_date');
            $end_date = strtotime($end_date);
        }
        $start_date = strtotime($start_date);
        $name = $request->input('name');
        if (is_null($name)){
            $sell = DB::select("select * from sell WHERE date >= $start_date and date <= $end_date ORDER BY date DESC");
        }else{
            $sell = DB::select("select * from sell WHERE id in (SELECT id from infor WHERE name like '%$name%') and date >= $start_date and date <= $end_date ORDER BY date DESC");
        }

        for($i = 0; $i < count($sell); $i++) {
            $infor = DB::select('select name from goods WHERE id = ?', [$sell[$i]->id]);
            $sell[$i]->name = $infor[0]->name;
        }
        $allNum = intval((count($sell) / 10) + 1);
        $sell = array_slice($sell, 10 * ($page - 1), 10);
        return view('manager/sell', [
            'sell' => $sell,
            'home' => '/manager/count/search/',
            'current' => $page,
            'total' => $allNum,
        ]);
    }

    /**
     * 把需要进货的商品取出
     * @param $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function message($page){
        $infor = DB::select('select id, name, number from infor WHERE number < 50');
        $allNum = intval((count($infor) / 10) + 1);
        $infor = array_slice($infor, 10 * ($page - 1), 10);
        return view('manager/message', [
            'infor' => $infor,
            'home' => '/message/',
            'total' => $allNum,
            'current' => $page,
        ]);
    }

    /**
     * 模拟销售，数量不够时发送信息
     * @param Request $request
     * @param $tid
     * @param $id
     * @param $page
     */
    public function setMessage(Request $request, $tid, $page, $id) {
        $infor = DB::select('select name, number from goods WHERE id = ?', [$id]);
        $number = $request->input('number');
        if($number < $infor[0]->number) {
            $infor = DB::select('select * from goods WHERE id = ?', [$id]);
            $price = $infor[0]->price;
            $date = time();
            $date_str = date("Y-m-d", $date);
            $date = strtotime($date_str);
            $num = $number;
            $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);
            $is_success = DB::update('update goods set number = ? where id = ?', [$infor[0]->number - $number, $id]);
            if($infor[0]->number - $number < 5) {
                $message = $infor[0]->name."需要进货";
                $is_success = DB::insert('insert into message(goods_id, message) VALUE(?, ?)', [$id, $message]);
                Func::alert('商品数量小于5，已向采购部门发送进货消息');
            }
        }else{
            Func::alert('别皮，去哪整那么多取去');
        }
        Func::redirect('/manager/'.$tid.'/'.$page);
    }

    /**
     * excel导出部分
     * @param Request $request
     * @param Excel $ex
     * @throws \Maatwebsite\Excel\Exceptions\LaravelExcelException
     */
    public function export(Request $request, Excel $ex){
        if(is_null($request->input('start_date'))){
            $start_date = '2000-01-01';
        } else {
            $start_date = $request->input('start_date');
        }
        if(is_null($request->input('end_date'))){
            $end_date = date(time());
        } else {
            $end_date = $request->input('end_date');
            $end_date = strtotime($end_date);
        }
        $start_date = strtotime($start_date);
        $name = $request->input('name');
        if (is_null($name)){
            $sell = DB::select("select * from sell WHERE date >= $start_date and date <= $end_date ORDER BY date DESC");
        }else{
            $sell = DB::select("select * from sell WHERE id in (SELECT id from infor WHERE name like '%$name%') and date >= $start_date and date <= $end_date ORDER BY date DESC");
        }
        if(count($sell) > 0) {
            for($i = 0; $i < count($sell); $i++) {
                $infor = DB::select('select name from goods WHERE id = ?', [$sell[$i]->id]);
                $sell[$i]->name = $infor[0]->name;
            }
            $title = [
                0   => '日期',
                1   => '编号',
                2   => '名称',
                3   => '数量',
                4   => '单价',
                5   => '总价'
            ];
            $export = null;
            foreach ($sell as $key => $val) {
                $export[$key][0] = date("Y-m-d", $val->date);
                $export[$key][1] = $val->id;
                $export[$key][2] = $val->name;
                $export[$key][3] = $val->number;
                $export[$key][4] = $val->price;
                $export[$key][4] = $val->all_price;
            }
            $sell = array_merge($title,$export);
            $ex->create('销售记录',function($excel) use ($sell){
                $excel->sheet('score', function($sheet) use ($sell){
                    $sheet->rows($sell);
                });
            })->export('xls');
            Func::goBack();
        }else {
            Func::alert('这个时间段没有销售记录');
            Func::goBack();
        }

    }
}