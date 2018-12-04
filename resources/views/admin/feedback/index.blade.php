@extends("admin.layout.form-layout")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Feedback</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Visualizar Feedback</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <div class="col-md-12">
                                <p>Nome: {{$feedback->name}}</p>
                                <p>Usuario: {{$feedback->email}}</p>
                                <p><a href="/admin/usuario/{{$feedback->user_id}}">Ver Mais dados do usuário</a></p>
                                <br>
                                <label>Feedback</label>
                                <p>{{$feedback->feedback}}</p>
                                <p>Criação em: {{date("d/m/Y",strtotime($feedback->created_at))}}</p>
                                <p>Atualizad Em: {{date("d/m/Y",strtotime($feedback->updated_at))}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section("js")
    <script>

        @if(!empty(session("ok")))
        new PNotify({
            title: 'Cadastro Realizado com Sucesso.',
            text: '{{session("ok")}}',
            type: 'success',
            styling: 'bootstrap3'
        });
        @endif

        @if(!empty(session("erro")))
        new PNotify({
            title: 'Falha ao executar o Cadastro.',
            text: '{{session("erro")}}',
            type: 'error',
            styling: 'bootstrap3'
        });
        @endif


    </script>
@endsection
