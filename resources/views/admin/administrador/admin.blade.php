@extends("admin.layout.form-layout")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Administrador</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar Por...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Buscar!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Visualizar Administrador</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" action="/admin/cadastrar" method="post"
                                  data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="nome" required="required"
                                               class="form-control col-md-7 col-xs-12" value="{{$admin->nome}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="usuario">Usuário <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="usuario" name="usuario" required="required"
                                               class="form-control col-md-7 col-xs-12" value="{{$admin->usuario}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="email" name="email" required="required"
                                               class="form-control col-md-7 col-xs-12" value="{{$admin->email}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="senha">Senha

                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="senha" name="senha"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="status" id="status" class="js-switch" checked/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button" onclick="window.location.href = '/admin/listar'">Cancelar</button>

                                        <button type="submit" class="btn btn-success">Alterar</button>
                                    </div>
                                </div>

                            </form>
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
        var status = "{{$admin->status}}";
            if(status == "1"){
                $("#status").prop('checked', true);

            }else{
                $("#status").prop('checked', false);
            }
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
