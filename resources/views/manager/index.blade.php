{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-7--}}
 {{--* Time: 下午10:03--}}
 {{--*/--}}
@extends('manager/home')

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
                <li class="active">{{$goods}}</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{$goods}}</h3>
                            <form id="mainform" action="{{url('/manager/'.$tid.'/search/1')}}" method = "GET" enctype="multipart/form-data">
                                <div class="col-lg-1" style="float: right;">
                                    <div class="form-group" >
                                            <select name="value">
                                                <option value="0">搜索内容</option>
                                                <option value="name">名称</option>
                                                <option value="brand">品牌</option>
                                                {{--@if($tid == 1)--}}
                                                    {{--<option value="population">适合人群</option>--}}
                                                {{--@else--}}
                                                    {{--<option value="deadline">保质期</option>--}}
                                                    {{--<option value="place">产地</option>--}}
                                                {{--@endif--}}
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" style="float: right;">
                                    <div class="input-group input-group-sm" style="width: 500px;">
                                        <input type="text" name="title" class="form-control pull-right" placeholder="搜索内容">
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
                                                <th rowspan="1" colspan="1">id</th>
                                                <th rowspan="1" colspan="1">名称</th>
                                                <th rowspan="1" colspan="1">品牌</th>
                                                @if($tid == 1)
                                                    <th rowspan="1" colspan="1">颜色</th>
                                                    <th rowspan="1" colspan="1">大小</th>
                                                    <th rowspan="1" colspan="1">适合人群</th>
                                                @else
                                                    <th rowspan="1" colspan="1">保质期</th>
                                                    <th rowspan="1" colspan="1">产地</th>
                                                @endif
                                                <th rowspan="1" colspan="1">价格</th>
                                                <th rowspan="1" colspan="1">数量</th>
                                                <th rowspan="1" colspan="1" style="width: 100px;">销售</th>
                                                <th rowspan="1" colspan="1">下架</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($tid == 1)
                                            @foreach($infor as $infor)
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">{{$infor -> id}}</td>
                                                    <td class="sorting_1">{{$infor -> name}}</td>
                                                    <td class="sorting_asc">{{$infor -> brand}}</td>
                                                    <td class="sorting_asc">{{$infor -> color}}</td>
                                                    <td class="sorting_asc">{{$infor -> size}}</td>
                                                    <td class="sorting_asc">{{$infor -> population}}</td>
                                                    <td class="sorting_1">{{$infor -> price}}</td>
                                                    <td class="sorting_1">{{$infor -> number}}</td>
                                                    <td class="sorting_asc">
                                                        <form id="mainform" action="{{url('/manager/set_message/'.$tid.'/'.$current.'/'.$infor->id)}}" method = "GET" enctype="multipart/form-data">
                                                            <input name="number" class="btn" placeholder="销售数量">
                                                        </form>
                                                    </td>
                                                    <td><button type="button" class="btn btn-warning" onclick="if(confirm('确认下架这件商品'))location.href = '{{url('/manager/out/'.$tid.'/'.$current.'/'.$infor->id)}}'">下架</button></td>
                                                </tr>
                                            @endforeach
                                            @else
                                                @foreach($infor as $infor)
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">{{$infor -> id}}</td>
                                                        <td class="sorting_1">{{$infor -> name}}</td>
                                                        <td class="sorting_1">{{$infor -> brand}}</td>
                                                        <td class="sorting_asc">{{$infor -> deadline}}</td>
                                                        <td class="sorting_asc">{{$infor -> place}}</td>
                                                        <td class="sorting_1">{{$infor -> price}}</td>
                                                        <td class="sorting_1">{{$infor -> number}}</td>
                                                        <td class="sorting_asc">
                                                            <form id="mainform" action="{{url('/manager/set_message/'.$tid.'/'.$infor->id.'/'.$current)}}" method = "GET" enctype="multipart/form-data">
                                                                <input name="number" class="btn" placeholder="销售数量">
                                                            </form>
                                                        </td>
                                                        <td><button type="button" class="btn btn-warning" onclick="if(confirm('确认下架这件商品？'))location.href = '{{url('/manager/out/'.$tid.'/'.$current.'/'.$infor->id)}}'">下架</button></td>
                                                    </tr>
                                                @endforeach
                                            @endif
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