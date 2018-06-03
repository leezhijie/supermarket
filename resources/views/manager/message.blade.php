{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-28--}}
 {{--* Time: 下午1:25--}}
 {{--*/--}}
@extends('manager/home')

@section('content')
    <div class = "row">
        <section class="content-header">
            <h1>
                商品进货
                <small>Preview page</small>
            </h1>
            <ol class="breadcrumb">
                <li>HOME</li>
                <li class="active">商品</li>
                <li class="active">发送信息</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">销售信息</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">商品名称</th>
                                                <th rowspan="1" colspan="1">数量</th>
                                                <th rowspan="1" colspan="1" >进货数量</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($infor as $infor)
                                                <tr role="row" class="even">
                                                    <td class="sorting_asc">{{$infor -> name}}</td>
                                                    <td class="sorting_asc">{{$infor -> number}}</td>
                                                    <td class="sorting_asc">
                                                        <form id="mainform" action="{{url('/manager/set_message/'.$infor->id)}}" method = "GET" enctype="multipart/form-data">
                                                            <input name="number" class="btn" placeholder="需要采购部门进货的数量">
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