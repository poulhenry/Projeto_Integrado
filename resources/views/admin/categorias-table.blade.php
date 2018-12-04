@extends("admin.layout.tables-layout")
@section("content")
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Categorias <small>Lista de categorias cadastradas no sistema.</small></h3>
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
                    <h2>Lista de Categorias</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Categoria</th>
                          <th>Gerada</th>
                          <th>Atualizada</th>
                          <th>Estado</th>
                          <th>Buscas</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($categorias as $categoria)
                        <tr>
                          <td>{{$categoria->nome}}</td>
                          <td>{{$categoria->created_at}}</td>
                          <td>{{$categoria->updated_at}}</td>
                          @if($categoria->status == 1)
                          <td>Ativada</td>
                          @else
                            <td>Desativada</td>
                          @endif
                          <td>11</td>
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