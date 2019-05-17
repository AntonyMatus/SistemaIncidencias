@extends('layouts.template')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Usuarios</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-block btn-outline-primary" style="display: inline;" href="{{ route('usuarios.agregar') }}">{{__('Agregar Usuario')}}</a>
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

<table id="usuarios-table" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Roles</th>
    <th width="280px">Action</th>
  </thead>
  <tbody>
    @foreach ($data as $key => $user)
    <tr>
      <td>{{ ++$key }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
        <label class="badge badge-success">{{ $v }}</label>
        @endforeach
        @endif
      </td>
      <td>
        <a class="btn btn-outline-info" href="{{ route('usuarios.ver',$user->id) }}">
          <i class="fa fas fa-eye fa-eye-alt"></i>ver
        </a>
        <a class="btn btn-outline-primary" href="{{ route('usuarios.editar',$user->id) }}">
          <span class="fa fa-edit"></span>Editar
        </a>
        <a data-toggle="modal" onclick="deleteData({{$user->id}})" data-target="#DeleteModal"
           class="btn btn-outline-danger">
          <span class="fa fa-trash-o"></span>Eliminar
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{-- {!! $data->render() !!} --}}
{{-- @include('usuarios.includes.modal-delete') --}}
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#usuarios-table').DataTable();
  });
</script>
@endsection