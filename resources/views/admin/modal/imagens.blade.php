
<div id="imagens">
    @foreach($imagens as $img)
        <div class="col-md-55">
            <div class="thumbnail">
                <div class="image view view-first">
                    <img style="width: 100%; display: block;" src="{{$img->url}}" alt="image">
                    <div class="mask">
                        <div class="tools tools-bottom">
                            <a href="#"><i class="fa fa-link"></i></a>
                            <a href="#"><i class="fa fa-pencil"></i></a>
                            <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <div class="caption">
                    <p>{{$img->nome}}</p>
                    <div class="radio">
                        <label class="">
                            <div class="iradio_flat-green checked" onclick="selecionarImg('{{$img->nome}}','{{$img->url}}')" style="position: relative;">
                                <input type="radio" class="flat" checked="false" name="iCheck" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                                </ins>
                            </div>

                        </label>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="col-md-12">

<div id="paginate-imagens">
    {{$imagens->links()}}
</div>
</div>
