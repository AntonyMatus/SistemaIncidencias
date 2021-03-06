@extends('layouts.template')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumbs', Breadcrumbs::render('roles'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de roles</h2>
        </div>
        <div class="pull-right">
          @can('registros.crear')
            <a class="btn btn-outline-success" style="display: inline;" href="{{ route('roles.agregar') }}">
                <i class="fa fa-plus"></i>{{__('Agregar Rol')}}
            </a>&nbsp;
            @endcan
            <a href="{{route('dashboard')}}" class="btn btn-outline-info">
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


<table id="rol-table" class="table table-striped table-bordered" style="width:100%">
  <thead>
     <th>No</th>
     <th>Nombre</th>
     <th width="280px">Acciones</th>
  </thead>
  <tbody>
    @foreach ($roles as $key => $role)
    <tr id="rol_id_{{ $role->id }}">
        <td>{{ ++$key }}</td>
        <td>{{ $role->name }}</td>
        <td>
          @can('registros.ver')
            <a class="btn btn-outline-info" href="{{ route('roles.ver',$role->id) }}">
                <span class="fa fas fa-eye fa-eye-alt"></span>Ver
            </a>
          @endcan
          @can('registros.editar')
            <a class="btn btn-outline-primary" href="{{ route('roles.editar',$role->id) }}">
                <span class="fa fa-edit"></span>Editar
            </a>
          @endcan
          @can('registros.eliminar')
            <a href="javascript:void(0)" class="button btn btn-outline-danger" data-id="{{$role->id}}">
                <span class="fa fa-trash-o"></span>Eliminar
            </a>
          @endcan
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#rol-table').DataTable();

    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('click', '.button', function (e) {
      e.preventDefault();
      var rol_id = $(this).data('id');

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
            url: `{{url('admin/roles/eliminar/${rol_id}')}}`,
            success: function (data) {
              $("#rol_id_" + rol_id).remove();
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