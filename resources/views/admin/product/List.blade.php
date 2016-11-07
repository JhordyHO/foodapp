@extends('layouts.main')
@section('content')



    <div class="row">
      <div class="card">
          <div class="card-content">
            <h2>Lista de los productos</h2>
              <p>lista de los productos que se encunetras en el sistema </p>
          </div>
          <div class="card-action">
                  <table class="striped">
                      <thead>
                      <tr>
                          <th data-field="img">imagen</th>
                          <th data-field="name">Name</th>
                          <th data-field="name">Creado</th>
                          <th data-field="precio">Precio</th>
                          <th data-field="state">Activo</th>
                      </tr>
                      </thead>
                      <tbody id="tabla_pro">
                      @foreach($product as $pro)
                      <tr>
                          <td><img class="icon-tab" src="{{$pro->imagen1}}">
                          <td>{{$pro->nombre_producto}}</td>
                          <td><i class="icon-tab light">{{$pro->created_at}}</i></td>
                          <td>{{$pro->precio}}</td>
                          <td>
                              @if($pro->estado=='on')
                                  <span class="icon"><i class="material-icons lime accent-3 icon_tab">check</i></span>
                               @endif
                          </td>
                      </tr>
                       @endforeach
                      </tbody>
                  </table>
              </div>
      </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection