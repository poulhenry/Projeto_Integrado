<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stiff Dev - Login</title>
    <!-- Bootstrap -->
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- PNotify -->
    <link href="{{asset('admin/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <!-- Custom Theme Style -->
    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/custom/custom.css')}}" rel="stylesheet">

</head>
<body class="login">
<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="/admin/login" method="post">
                    @csrf
                    <h1>Admin Login</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="senha" placeholder="Senha" required=""/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">Entrar</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <br/>
                        @if(!empty(session('erro')))
                            <div class="alert alert-danger">
                                {{session('erro')}}
                            </div>
                        @endif
                        <div>
                            <h1><i class="fa fa-code"></i> Stiff Code</h1>

                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
