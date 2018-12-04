@extends("admin.layout.tables-layout")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Categorias
                        <small>Lista de administradores cadastradas no sistema.</small>
                    </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
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
                            <h2>Lista de Administradores</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Pais</th>
                                    <th>Estado</th>
                                    <th>Cidade</th>
                                    <th>CEP</th>
                                    <th>Bairro</th>
                                    <th>Endereco</th>
                                    <th>N°</th>
                                    <th>Complemento</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($localizacoes as $local)
                                    <tr>
                                        <td>{{$local->pais}}</td>
                                        <td>{{$local->estado}}</td>
                                        <td>{{$local->cidade}}</td>
                                        <td>{{$local->cep}}</td>
                                        <td>{{$local->bairro}}</td>
                                        <td>{{$local->endereco}}</td>
                                        <td>{{$local->numero}}</td>
                                        <td>{{$local->complemento}}</td>

                                        @if($local->status == 1)
                                            <td>Ativado</td>
                                        @else
                                            <td>Desativado</td>
                                        @endif
                                        <td>{{date("d/m/Y H:i",strtotime($local->created_at))}}</td>
                                        <td>
                                            <a href="/admin/localizacao/{{$local->id}}">
                                                <i>
                                                    Editar
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section("js")
@endsection
