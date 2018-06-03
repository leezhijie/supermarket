{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-14--}}
 {{--* Time: 下午8:07--}}
 {{--*/--}}
@extends('manager/home')

@section('content')
    <div class = "row">
        <section class="content-header">
            <h1>
                销售信息
                <small>Preview page</small>
            </h1>
            <ol class="breadcrumb">
                <li>HOME</li>
                <li class="active">商品</li>
                <li class="active">销售信息</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">销售信息</h3>
                            <form id="mainform" action="{{url('/manager/count/search/1')}}" method = "GET" enctype="multipart/form-data">
                                <div class="col-sm-6" style="float: left;">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="start_date" class="form-control pull-right" placeholder="开始时间，格式0000-00-00">
                                    </div>
                                </div>
                                <div class="col-sm-6" style="float: right;">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="end_date" class="form-control pull-right" placeholder="结束时间，格式0000-00-00">
                                    </div>
                                </div>
                                <div class="col-sm-6" style="float: right;" >
                                    <div class="input-group input-group-sm" style="width: 500px;">
                                        <input type="text" name="name" class="form-control pull-right" placeholder="商品名称">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">日期</th>
                                                <th rowspan="1" colspan="1">商品编号</th>
                                                <th rowspan="1" colspan="1">名称</th>
                                                <th rowspan="1" colspan="1">数量</th>
                                                <th rowspan="1" colspan="1">单价</th>
                                                <th rowspan="1" colspan="1">总价</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sell as $sell)
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">{{date('Y-m-d', $sell -> date)}}</td>
                                                        <td class="sorting_asc">{{$sell -> id}}</td>
                                                        <td class="sorting_asc">{{$sell -> name}}</td>
                                                        <td class="sorting_asc">{{$sell -> number}}</td>
                                                        <td class="sorting_asc">{{$sell -> price}}</td>
                                                        <td class="sorting_asc">{{$sell -> all_price}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @include('pagniation')
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection