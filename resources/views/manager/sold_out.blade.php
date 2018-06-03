{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-28--}}
 {{--* Time: 下午7:56--}}
 {{--*/--}}
@extends('manager/editor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class = "row">
    <section class="content-header">
        <h1>
            下架理由
            <small>Advanced form element</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">商品</a></li>
            <li class="active">下架</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/manager/sold_out/'.$tid.'/'.$page.'/'.$id)}}" method = "POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Bootstrap WYSIHTML5
                            <small>Simple and fast</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            {{--<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"--}}
                                    {{--title="Collapse">--}}
                                {{--<i class="fa fa-minus"></i></button>--}}
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <form>
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </form>
                    </div>
                    <div class="box-footer">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <button id="submitButton" type="submit" class="btn btn-primary">下架</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    </div>
                    </div>
                </form>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    </div>

    <!-- Control Sidebar -->
@endsection