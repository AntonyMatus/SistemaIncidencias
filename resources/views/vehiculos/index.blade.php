@extends('layouts.template')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

@endsection

@section('breadcrumbs', Breadcrumbs::render('vehiculos'))


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Vehiculos</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-block btn-outline-primary" style="display: inline;" href="{{ route('vehiculos.agregar') }}">{{__('Agregar Vehiculo')}}</a>
        <a href="{{route('dashboard')}}" class="btn btn-info">
          <i class="fa fa-mail-reply"></i>{{__('volver')}}
        </a>
      </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    @foreach ($vehiculos as $vehiculo)
    <div class="col-sm">
    <div id="vehiculos-card" class="card text-center" style="width: 18rem">
        <img style="width: 200px; height: 200px; background-color: #EFEFEF; margin: 20px;"
        class="card-img-top rounded-circle mx-auto d-block" src="{{ asset('storage').'/'. $vehiculo->imagen}} " alt="{{$vehiculo->id}}"  >
        <div class="card-body">
          <h5 class="card-title">Unidad: {{$vehiculo->vehiculo_unidad}} </h5>
          <p class="card-text"></p>
        </div>
        <div class="card-footer dropdown">
          <a class="btn btn-brand btn-facebook float-left" href="{{ route('vehiculos.ver', $vehiculo->id)}}">
            <i class="fa fa-eye"></i>
            <span>Ver</span>
          </a>
          <button type="button" class="btn btn-secondary dropdown-toggle float-right" data-toggle="dropdown">Mas.</button>
          <div class="dropdown-menu">
            <a class="dropdown-item btn-secondary" href="{{route('vehiculos.ver', $vehiculo->id)}}"><span class="fa fas fa-eye fa-eye-alt"></span>Ver</a>
            <a class="dropdown-item btn-secondary" href="{{route('vehiculos.editar', $vehiculo->id)}}"><span class="fa fa-edit"></span>Editar</a>
            <form method="POST" action="{{route('vehiculos.eliminar',[ 'id' => $vehiculo->id])}}">
              @csrf
              <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>
              </form>
          </div>
        </div>
      </div>
  </div>
  @endforeach
</div>

<!--
<table id="vehiculos-table" class="table table-striped table-bordered" style="width: 100%">
    <thead>
        <th>No</th>
        <th>Unidad_vehiculo</th>
        <th width="280px">Acciones</th>
    </thead>
    <tbody>
        @foreach ($vehiculos as $key => $vehiculo)
    <tr id="vehiculo_id_{{$vehiculo->id}}">
        <td>{{ ++$key }}</td>
        <td>{{$vehiculo->vehiculo_unidad}}</td>
        <td>
                <a class="btn btn-outline-info" href="{{ route('vehiculos.ver',$vehiculo->id) }}">
                        <span class="fa fas fa-eye fa-eye-alt"></span>Ver
                      </a>
                      <a class="btn btn-outline-primary" href="{{ route('vehiculos.editar',$vehiculo->id) }}">
                        <span class="fa fa-edit"></span>Editar
                      </a>
                      <a href="javascript:void(0)" class="button btn btn-outline-danger" data-id="{{$vehiculo->id}}">
                        <span class="fa fa-trash-o"></span>Eliminar
                </a>
        </td>
    </tr>
        @endforeach
  </tbody>
</table>
-->
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function() {
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.button', function (e) {
        e.preventDefault();
        var vehiculo_id = $(this).data('id');
        const swalWithBootstrapButtons = swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: '¡Sí, bórralo!',
        cancelButtonText: 'No, cancela!',
        reverseButtons: true
        }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: `{{url('admin/vehiculos/eliminar/${vehiculo_id}')}}`,
                success: function (data) {
                    $("#vehiculo_id_" + vehiculo_id).remove();
                    swalWithBootstrapButtons.fire(
                    'Eliminado!',
                    'Su Registro ha sido eliminado.',
                    'success'
                    )
                }
            });
        } else if (
            result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'Tu Registro es seguro :)',
            'error'
            )
        }
        });
    });
}); 
</script>
@endsection