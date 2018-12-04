<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bike Park | </title>
    <!-- Bootstrap -->
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{asset('admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
          rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{asset('admin/vendors/normalize-css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

    <!-- PNotify -->
    <link href="{{asset('admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">

    <!-- Bootstrap Colorpicker -->
    <link href="{{asset('admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}"
          rel="stylesheet">

    <link href="{{asset('admin/vendors/cropper/dist/cropper.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/custom/custom.css')}}" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="{{asset('admin/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{asset('admin/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('admin/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{asset('admin/vendors/starrr/dist/starrr.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin/index" class="site_title"><i class="fa fa-bicycle"></i> <span>Bike Park</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_info">
                        <div align="center">
                            <span>Bem Vindo</span>
                            <h2>{{Auth::guard("admin")->user()->name}}</h2>
                        </div>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
            @include("admin.includes.menu")
            <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                {{Auth::guard("admin")->user()->nome}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="/admin/{{Auth::guard("admin")->user()->id}}"> Perfil</a>
                                </li>
                                <li>
                                    <form action="/admin/sair" method="post">
                                        @csrf
                                        <button type="submit"><i class="fa fa-sign-out pull-right"></i> Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

    @yield("content")

    <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<!-- jQuery -->
<script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('/admin/vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('/admin/vendors/iCheck/icheck.min.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('/admin/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{asset('/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Ion.RangeSlider -->
<script src="{{asset('/admin/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<!-- Bootstrap Colorpicker -->
<script src="{{asset('/admin/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- jquery.inputmask -->
<script src="{{asset('/admin/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- jQuery Knob -->
<script src="{{asset('/admin/vendors/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- Cropper -->
<script src=".{{asset('/admin/vendors/cropper/dist/cropper.min.js')}}"></script>


<!-- bootstrap-wysiwyg -->
<script src="{{asset('/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('/admin/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{asset('/admin/vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- jQuery Tags Input -->
<script src="{{asset('/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
<!-- Switchery -->
<script src="{{asset('/admin/vendors/switchery/dist/switchery.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Parsley -->
<script src="{{asset('/admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
<!-- Autosize -->
<script src="{{asset('/admin/vendors/autosize/dist/autosize.min.js')}}"></script>
<!-- jQuery autocomplete -->
<script src="{{asset('/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
<!-- starrr -->
<script src="{{asset('/admin/vendors/starrr/dist/starrr.js')}}"></script>
<!-- PNotify -->
<script src="{{asset('/admin/vendors/pnotify/dist/pnotify.js')}}"></script>
<script src="{{asset('/admin/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
<script src="{{asset('/admin/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('/admin/build/js/custom.min.js')}}"></script>


@yield("js")
</body>
</html>
