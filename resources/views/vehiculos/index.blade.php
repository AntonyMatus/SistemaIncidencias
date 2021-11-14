@extends('layouts.template')

@section('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

@endsection

@section('breadcrumbs', Breadcrumbs::render('vehiculos'))
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Vehiculos</h2>
      </div>
      <div class="pull-right">
        @can('vehiculos.crear')
        <a class="btn btn-block btn-outline-primary" style="display: inline;" href="{{ route('vehiculos.agregar') }}">{{__('Agregar Vehiculo')}}</a>
        @endcan
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
    <div  class="card bg-light border-primary text-black" style="width: 18rem">
      <div class="view overlay">
        <img id="imagen"  class="card-img-top" src="{{ asset('storage').'/'. $vehiculo->imagen}} " alt="{{$vehiculo->id}}" style="width: 286px; height: 200px; background-color: #EFEFEF;" >
      </div>
        <div class="card-body elegant-color white-text rounded-bottom">
              <hr>
          <h5 class="card-title">Unidad: {{$vehiculo->vehiculo_unidad}} </h5>
          <p class="card-text"></p>
        </div>
        <div class="card-footer dropdown">
          @can('vehiculos.ver')
          <a class="btn btn-outline-info" href="{{ route('vehiculos.ver', $vehiculo->id)}}">
            <span class="fa fas fa-eye fa-eye-alt"></span>Ver
          </a>
          @endcan

          <button type="button" class="btn btn-outline-success dropdown-toggle float-right" data-toggle="dropdown">Mas.</button>
          <div class="dropdown-menu">
            @can('vehiculos.editar')
            <a class="dropdown-item " href="{{route('vehiculos.editar', $vehiculo->id)}}"><span class="fa fa-edit"></span>Editar</a>
            @endcan
            @can('vehiculos.eliminar')
            <form method="POST" action="{{route('vehiculos.eliminar',[ 'id' => $vehiculo->id])}}">
              @csrf
              <button class="btn btn-danger btn-block" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>
              </form>
            @endcan
          </div>
        </div>
      </div>
  </div>
  @endforeach
</div>
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