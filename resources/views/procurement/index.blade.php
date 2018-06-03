{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-30--}}
 {{--* Time: 上午1:27--}}
 {{--*/--}}
@extends('procurement/home')

@section('content')
    <div class = "row">
        <section class="content-header">
            <h1>
                商品信息
                <small>Preview page</small>
            </h1>
            <ol class="breadcrumb">
                <li>HOME</li>
                <li class="active">商品</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">商品信息</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">id</th>
                                                <th rowspan="1" colspan="1">名称</th>
                                                <th rowspan="1" colspan="1">数量</th>
                                                <th rowspan="1" colspan="1" style="width: 100px;">进货</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($infor as $infor)
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">{{$infor -> id}}</td>
                                                        <td class="sorting_1">{{$infor -> name}}</td>
                                                        <td class="sorting_1">{{$infor -> number}}</td>
                                                        <td class="sorting_asc">
                                                            <form id="mainform" action="{{url('/procurement/insert/1/'.$infor -> id)}}" method = "GET" enctype="multipart/form-data">
                                                                <input name="number" class="btn" placeholder="进货数量">
                                                            </form>
                                                        </td>
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