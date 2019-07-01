@extends('layouts.template')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('breadcrumbs', Breadcrumbs::render('cargos'))

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Cargos</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-block btn-outline-primary" style="display: inline;" href="{{ route('cargos.agregar') }}">{{__('Agregar Cargo')}}</a>
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

    <table id="cargos-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <th>No</th>
              <th>Cargo</th>
              <th width="280px">Acciones</th>
            </thead>
            <tbody>
              @foreach ($Cargo as $key => $user)
              <tr id="user_id{{ $user->id }}">
                <td>{{ ++$key }}</td>
                <td>{{ $user->cargo }}</td>
                <td>
                  <a class="btn btn-outline-info" href="{{ route('cargos.ver',$user->id) }}">
                    <span class="fa fas fa-eye fa-eye-alt"></span>Ver
                  </a>
                  <a class="btn btn-outline-primary" href="{{ route('cargos.editar',$user->id) }}">
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
          $('#cargos-table').DataTable();
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
                  url: `{{url('admin/cargos/eliminar/${user_id}')}}`,
                  success: function (data) {
                    $("#cargo_id" + user_id).remove();
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