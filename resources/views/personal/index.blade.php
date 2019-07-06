@extends('layouts.template')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumbs', Breadcrumbs::render('personal'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Personal</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-block btn-outline-primary" style="display: inline;" href="{{ route('personal.agregar') }}">{{__('Agregar Personal')}}</a>
        <a href="{{route('dashboard')}}" class="btn btn-info">
          <i class="fa fa-mail-reply"></i>{{__('volver')}}
        </a>
      </div>
    </div>
  </div>

<table id="personal-table" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <th>No</th>
    <th>Nombre Completo</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Cargo</th>
    <th width="280px">Acciones</th>
  </thead>
  <tbody>
    @foreach ($personal as $key => $user)
    <tr id="user_id{{ $user->id }}">
      <td>{{ ++$key }}</td>
      <td>{{ $user->nombre_completo }}</td>
      <td>{{ $user->apellido_paterno }}</td>
      <td>{{ $user->apellido_materno }}</td>
      <td>{{ $user->cargo->cargo}}</td>
      <td>
        <a class="btn btn-outline-primary" href="{{ route('personal.editar',$user->id) }}">
          <span class="fa fa-edit"></span>Editar
        </a>
        <a href="javascript:void(0)" class="button btn btn-outline-danger" data-id="{{$user->id}}">
          <span class="fa fa-trash-o"></span>Eliminar
        </a>
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
    var table = $('#personal-table').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando registros del  _START_ al  _END_ de un total _TOTAL_",
        "infoEmpty": "Mostrando registros del 0 al  0 de un total de  0 registros",
        "infoFiltered": "(Filtrado de un total de  _MAX_ registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
              }
            },
          });

          $('#personal-table').DataTable();
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
      
          $(document).on('click', '.button', function (e) {
            e.preventDefault();
            var user_id = $(this).data('id');
      
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
                  url: `{{url('admin/personal/eliminar/${user_id}')}}`,
                  success: function (data) {
                    $("#user_id" + user_id).remove();
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