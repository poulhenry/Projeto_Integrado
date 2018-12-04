@extends("admin.layout.form-layout")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <form action="/admin/cadastrar/post" id="form-post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="page-title">
                    <div class="title_left">
                        <h3>Criar uma nova Postagem</h3>
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Titulo da Postagem</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>

                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <input type="text" name="titulo" placeholder="Titulo da postagem..."
                                       class="form-control">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Corpo da Postagem
                                <small></small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="alerts"></div>
                            <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i
                                                class="fa fa-font"></i><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                                class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a data-edit="fontSize 5">
                                                <p style="font-size:17px">Huge</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-edit="fontSize 3">
                                                <p style="font-size:14px">Normal</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-edit="fontSize 1">
                                                <p style="font-size:11px">Small</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="btn-group">
                                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i
                                                class="fa fa-italic"></i></a>
                                    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                                class="fa fa-strikethrough"></i></a>
                                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                                class="fa fa-underline"></i></a>
                                </div>

                                <div class="btn-group">
                                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                                class="fa fa-list-ul"></i></a>
                                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                                class="fa fa-list-ol"></i></a>
                                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                                class="fa fa-dedent"></i></a>
                                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                </div>

                                <div class="btn-group">
                                    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                                class="fa fa-align-left"></i></a>
                                    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                                class="fa fa-align-center"></i></a>
                                    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                                class="fa fa-align-right"></i></a>
                                    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                                class="fa fa-align-justify"></i></a>
                                </div>

                                <div class="btn-group">
                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i
                                                class="fa fa-link"></i></a>
                                    <div class="dropdown-menu input-append">
                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                        <button class="btn" type="button">Add</button>
                                    </div>
                                    <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                                </div>

                                <div class="btn-group">
                                    <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i
                                                class="fa fa-picture-o"></i></a>
                                    <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                                           data-edit="insertImage"/>
                                </div>

                                <div class="btn-group">
                                    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i
                                                class="fa fa-repeat"></i></a>
                                </div>
                            </div>

                            <div id="editor-one" class="editor-wrapper"></div>

                            <textarea name="descr" id="descr" style="display:none;"></textarea>

                            <br/>

                            <div class="ln_solid"></div>
                            <br/>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="select2_single form-control" tabindex="-1" name="categoria">
                                        <option></option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="ln_solid"></div>
                            <div class="control-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input id="tags_1" name="tags" type="text" class="tags form-control" value=""/>
                                    <div id="suggestions-container"
                                         style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fim corpo post -->
                <!-- form datetimepicker -->
                <div class="x_panel" style="">
                    <div class="x_title">
                        <h2>Agende sua Postagem
                            <small> Caso deseja realizar a postagem automaticamente após finalizar deixe os campos em
                                branco.
                            </small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="container">
                            <div class="row">
                                <div class='col-sm-6'>
                                    Data de Agendamento da postagem
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker2'>
                                            <input type='text' class="form-control" name="data"/>
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-sm-6'>
                                    Horário
                                    <small>For 24H format use format: 'HH:mm'</small>
                                    <div class="form-group">
                                        <div class='input-group date' id='myDatepicker3'>
                                            <input type='text' class="form-control" name="hora"/>
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {{--Inicio Imagem--}}
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Imagem em Destaque
                            <small>480px x 480px</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <div class="row">
                            <div class="col-md-12">
                                <a onclick="gerenciadorImagens()">
                                    <img height="90px" id="imgGerenciador" width="90px" src="{{asset('/img/img.png')}}"/>
                                </a>
                                <label id="imgNome" style="margin-top: 30px; margin-left: 15px;"></label>
                            </div>
                        </div>

                        <input type="hidden" name="imagemPrincipal" id="imgPrincipal"/>
                    </div>
                </div>

                {{--Fim imagem --}}


                <div class="x_panel">
                    <div class="x_title">
                        <h2>SEO
                            <small> Otimizador de busca</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <label for="titulo_seo">Página Titulo * :</label>
                        <input type="text" id="titulo_seo" class="form-control" name="seotitulo" required/>
                        <label for="descricao">SEO Descrição: (Máximo 160 caracteres)</label>
                        <textarea id="descricao" required="required" class="form-control" name="descricao"
                                  data-parsley-trigger="keyup" data-parsley-maxlength="160"
                                  data-parsley-maxlenght-message="Diminua o texto o tamanho máximo é de 160 caracteres."
                                  data-parsley-validation-threshold="10"></textarea>
                        <br/>

                    </div>
                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cadastrar
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancelar</button>
                                <button class="btn btn-primary" type="reset">Limpar</button>
                                <button type="button" id="cadastrar" class="btn btn-success">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /page content -->
    <!-- Large modal -->
    <div class="modal fade bd-example-modal-lg" id="gerenciador-imagens" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gerenciador de Imagens</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div align="center">

                    <div class="loader" id="loader"></div>
                    </div>
                    <div class="row" id="modal-loader">
                        <div class="col-md-12">
                            <div class="row">
                                <a class="btn btn-app" onclick="upload()">
                                    <i class="fa fa-upload"></i> Upload
                                </a>
                                <a class="btn btn-app" onclick="refresh()">
                                    <i class="fa fa-refresh"></i> Atualizar
                                </a>
                                <a class="btn btn-app" onclick="teste()">
                                    <i class="fa fa-trash-o"></i> Remover
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div id="modal-include">
                                @include('admin.modal.imagens', ['imagens' => $imagens])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="marcarImagem()">Selecionar Imagem</button>
                </div>
            </div>
        </div>
    </div>

    <form action="/admin/cadastrar/imagem" id="form-upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" id="upload_file" name="img" style="display: none;" />
    </form>
    <script>



        function upload(){
            $("#upload_file").click();
        }


    </script>
@endsection
@section("js")

    <!-- Initialize datetimepicker -->
    <script>
    var img_selecionada_nome;
    var img_selecionada_url;
    $("#imgNome").hide();
        function marcarImagem(){
            console.clear();
            console.log(img_selecionada_url);
            $("#imgGerenciador").attr("src",img_selecionada_url);
            $("#imgPrincipal").val(img_selecionada_url);
            $("#imgNome").html(img_selecionada_nome);
            $("#imgNome").show();
            $("#gerenciador-imagens").modal("hide");
        }
        function selecionarImg(nome,url){
            img_selecionada_url = url;
            img_selecionada_nome = nome;
        }
    $("#loader").hide();

        function teste(){
            console.log("teste");
            $.ajax({
                url: "/admin/imagens/paginate",
                cache: false,
                processData: false,
                contentType: false,
                type: 'GET',
                success: function (data) {
                   $("#paginate-imagens").html(data);
                }
            });
        }
        function refresh(){

        }
        $(document).ready(function(){
            //because new a href was born so jquery dont know we need to use document on to check or static element
            //ok it's working, now you can try with this way to make pagination via ajax. i stop it now, see you in next video with CRUD
            $(document).on('click', '.pagination a', function(e) {
                $("#loader").show();
                $("#modal-loader").hide();
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function(result) {
                        if ( result.status == 'ok' ) {
                            console.log(result);
                            $('#modal-include').html(result.listing);
                        }
                        else {
                            alert("Error when get pagination");
                        }
                    },
                    error: function(erro){
                        console.log(erro);
                    }
                });
                $("#modal-loader").show();
                $("#loader").hide();
                return false;
            });
        });

        function gerenciadorImagens() {
            $("#gerenciador-imagens").modal("show");
        }

        $("#upload_file").change(function (){

            var form = document.getElementById("form-upload");
            var fd = new FormData(form);
            $.ajax({
                url: "/admin/cadastrar/imagem",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    console.log("Upload img "+data);
                },
                error: function (data){
                    console.log(data);
                }
            });
        });
        $('#myDatepicker2').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#myDatepicker3').datetimepicker({
            format: 'HH:mm A'
        });
        $("#cadastrar").click(function () {
            var post = $("#editor-one").html();
            $("#descr").val(post);
            $("#form-post").submit();
        });


    </script>

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