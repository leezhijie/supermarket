{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-30--}}
 {{--* Time: 上午12:33--}}
 {{--*/--}}
@extends('manager/editor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class = "row">
        <section class="content-header">
            <h1>
                Excel导出
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('/manager/export')}}" method = "POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">新公告
                                    <small>Advanced and full of features</small>
                                </h3>
                            </div>
                            <div class="box-body pad" style="display: block;">
                                <div class="form-group" >
                                    <label for="noticeTitle">商品名称</label>
                                    <input type="text" name="name" class="form-control" id="noticeTitle" >
                                </div>

                            </div>
                            <div class="box-body pad" style="display: block;">
                                <div class="form-group" >
                                    <label for="noticeTitle">开始时间</label>
                                    <input type="text" name="start_date" class="form-control" id="noticeTitle" placeholder="格式：0000-00-00">
                                </div>

                            </div>
                            <div class="box-body pad" style="display: block;">
                                <div class="form-group" >
                                    <label for="noticeTitle">截止时间</label>
                                    <input type="text" name="end_date" class="form-control" id="noticeTitle" placeholder="格式：0000-00-00">
                                </div>

                            </div>

                            <div class="box-footer">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                <button id="submitButton" type="submit" class="btn btn-primary">发布</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            </div>
                        </div></form>
                </div>
            </div>
        </section>

    </div>

    <!-- Control Sidebar -->
@endsection