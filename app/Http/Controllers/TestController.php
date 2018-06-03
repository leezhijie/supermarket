<?php
/**
 * Created by PhpStorm.
 * User: zhijielee
 * Date: 18-5-9
 * Time: 上午10:16
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class TestController extends Controller {

    public function sell(){
        $id = 1;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-04-29";
        $date = strtotime($date_str);
        $num = 5;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 6;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-04-29";
        $date = strtotime($date_str);
        $num = 4;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);


        $id = 2;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-04-30";
        $date = strtotime($date_str);
        $num = 2;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);


        $id = 2;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-01";
        $date = strtotime($date_str);
        $num = 1;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 23;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-01";
        $date = strtotime($date_str);
        $num = 26;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);


        $id = 18;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-01";
        $date = strtotime($date_str);
        $num = 52;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);


        $id = 30;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-01";
        $date = strtotime($date_str);
        $num = 654;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 27;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-02";
        $date = strtotime($date_str);
        $num = 54;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 26;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-02";
        $date = strtotime($date_str);
        $num = 26;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 26;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-03";
        $date = strtotime($date_str);
        $num = 54;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 7;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-04";
        $date = strtotime($date_str);
        $num = 4;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 5;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-04";
        $date = strtotime($date_str);
        $num = 3;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 18;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-05";
        $date = strtotime($date_str);
        $num = 24;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        $id = 26;
        $infor = DB::select('select * from infor WHERE id = ?', [$id]);
        $price = $infor[0]->price;
        $date_str = "2018-05-06";
        $date = strtotime($date_str);
        $num = 54;
        $is_success = DB::insert('insert into sell (date, id, number, price, all_price) VALUES 
                  (?, ?, ?, ?, ?)', [$date, $id, $num, $price, $price * $num]);

        dd("草拟吗");

    }

}