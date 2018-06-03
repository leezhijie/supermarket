{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: zhijielee--}}
 {{--* Date: 18-5-7--}}
 {{--* Time: 下午11:17--}}
 {{--*/--}}
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/Template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>管理员</p>
                    <i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                {{--衣服--}}
                <li>
                    <a href="/manager/1/1">
                        <i class="fa fa-table"></i> <span>衣服</span>
                    </a>
                </li>
                {{--食物--}}
                <li>
                    <a href="/manager/2/1">
                        <i class="fa fa-dashboard"></i> <span>食物</span>
                    </a>
                </li>
                {{--添加--}}
                {{--<li>--}}
                    {{--<a href="/calendar.html">--}}
                        {{--<i class="fa fa-edit"></i> <span>添加</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--统计--}}
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-pie-chart"></i> <span>统计</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/manager/count/1"><i class="fa fa-circle-o"></i> 查看</a></li>
                        <li><a href="/manager/count/excel"><i class="fa fa-circle-o"></i> 发布</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
