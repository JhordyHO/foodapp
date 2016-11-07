@extends('layouts.main')
@section('content')



        <div class="row">
        {!! Form::open(['route'=> 'product.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
            <input type="hidden" name="id_User" value="{{Auth::user()->id}}">
            <input id="img1" type="hidden" name="imagen1" value="">
            <input id="img2" type="hidden" name="imagen2" value="">
            <input id="img3" type="hidden" name="imagen3" value="">
            <input id="img4" type="hidden" name="imagen4" value="">
        <!-- header form -->
            <div class="row">
                <div class="col s12 ">
                    <div class="card">
                        <div class="card-content">

                        <div class="row">
                            <div class="col s4">
                            <!-- Switch -->
                                <p style="margin-top: -05px;">Activar Producto</p>
                            <div id="active" class="switch">
                                <label>
                                    Activo
                                    <input name="estado" type="checkbox">
                                    <span class="lever"></span>
                                    Desactivo
                                </label>
                            </div>
                            </div>
                            <div class="col s4">
                            <!-- Switch -->
                                <p style="margin-top: -05px;">Marcar Como New</p>
                            <div id="active" class="switch">
                                <label>
                                    Activo
                                    <input name="new" type="checkbox">
                                    <span class="lever"></span>
                                    Desactivo
                                </label>
                            </div>
                                </div>
                            <div class="col s4">
                                <!-- Switch -->
                                <p style="margin-top: -05px;">Poner en Destacados</p>
                                <div id="active" class="switch">
                                    <label>
                                        Activo
                                        <input name="destacado" type="checkbox">
                                        <span class="lever"></span>
                                        Desactivo
                                    </label>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6 l6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Photos Products</span>
                            <div class="resp_img">
                                <img id="upload_img" src="images/upload_img.png">
                            </div>
                        </div>
                        <div class="card-action">
                            <a class="modal-trigger waves-effect waves-light btn btn-block" href="#uploadimg">Subir imagen</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Details Products</span>
                        </div>
                        <div class="card-action">
                           <div class="row">
                               <div class="col s6">
                                   <div class="row">
                                       <select name="id_category">
                                           <option value="0" disabled selected>Categoria Producto</option>
                                           <option value="1">Option 1</option>
                                           <option value="2">Option 2</option>
                                           <option value="3">Option 3</option>
                                       </select>
                                       <label>Categoria a Mostrar</label>
                                   </div>
                                   <div class="row">
                                           <input name="nombre_producto" id="nombre" type="text" class="validate">
                                           <label for="nombre">Nombre Producto</label>
                                   </div><div class="row">
                                           <input name="precio" id="precio" type="number" class="validate">
                                           <label for="precio">Precio Producto</label>
                                   </div>
                                   <div class="row">
                                       <textarea name="descripcion" id="textarea1" class="materialize-textarea"></textarea>
                                       <label for="textarea1">Descripcion Producto</label>
                                   </div>
                               </div>
                               <div class="col s6">
                                   Tangs
                                   <div  class="chips chips-initial"></div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="enviar">
            {!! Form::close() !!}
            <div id="uploadimg" class="modal bottom-sheet">
                <div class="modal-content">
                    <div class="row">
                        {!! Form::open(array('route' => 'fileUpload','enctype' => 'multipart/form-data','id'=>'upload_form')) !!}
                        <div class="row cancel">
                            <div class="file-field input-field" style="margin-left: 10px; margin-right: 10px;">
                                <div class="btn">
                                    <span>File</span>
                                    {!! Form::file('image', array('class' => 'image','id'=>'uploadfile')) !!}
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Subir Imagenes">
                                </div>
                            </div>
                                <button id="subir" type="submit" class="btn lime">Create</button>
                               <ul id="listimg">
                               </ul>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>
        </div>
@endsection
@section('footer')
    <script>
        var nimg = 0;
        $('.resp_img').click(function () {
            $('#uploadimg').openModal('open');
        });

        $(document).ready(function () {

            $('#subir').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = new FormData($('#upload_form')[0]);
                $.ajax({
                    url:'fileUpload',
                    data:formData,
                    method:'POST',
                    cache: false,
                    contentType : false,
                    processData : false,
                    beforeSend : function () {
                        $('body').removeClass('loaded');
                    },
                    success:function (d) {
                        $('body').addClass('loaded');
                        nimg=nimg+1;
                        console.log(nimg);
                        var imgbd = '#img'+nimg;
                        $(imgbd).val(d);
                        $('#upload_img').css('display','none');
                        var img = '<img id="imagen_load" src="'+d+'" width="420" />'
                        var img2 = '<li><img  src="'+d+'" class="img-thumbnail"></li>'
                        $('.resp_img').append(img);
                        $('#listimg').append(img2);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });

        });
    </script>
@endsection