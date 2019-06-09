@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Vehiculos Management</h2>
        </div>
        <div class="pull-right">
        @can('vehiculos.crear')
            <a class="btn btn-success" href="{{ route('vehiculos.agregar') }}">{{__('Agregar Vehiculo')}}</a>
        @endcan
        <a href="{{route('dashboard')}}" class="btn btn-info">{{__('volver')}}</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{__('Vehiculo Unidad')}}</th>
                    <th>{{__('Acciones')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $vehiculo)
                    <tr id="vehiculo_id_{{ $vehiculo->id }}">
                        <td>{{$vehiculo->vehiculo_unidad}}</td>
                        <td>
                            @can('vehiculos.ver')
                                <a class="btn btn-info" href="{{ route('vehiculos.ver',$vehiculo->id) }}">Show</a>
                            @endcan
                            @can('vehiculos.editar')
                                <a class="btn btn-primary" href="{{ route('vehiculos.editar',$vehiculo->id) }}">Edit</a>
                            @endcan
                            @can('vehiculos.eliminar')
                            <a href="javascript:void(0)" class="button btn btn-danger" data-id="{{$vehiculo->id}}">Delete</a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="10">{{__('No hay registros para mostrar')}}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <div>
                {!! $vehiculos->links() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
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