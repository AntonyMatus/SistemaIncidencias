@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Productos Management</h2>
        </div>
        <div class="pull-right">
        @can('productos.crear')
            <a class="btn btn-success" href="{{ route('productos.agregar') }}">{{__('Agregar Producto')}}</a>
        @endcan
        <a href="{{route('dashboard')}}" class="btn btn-info">{{__('volver')}}</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>{{__('Producto')}}</th>
                    <th>{{__('Acciones')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr id="producto_id_{{ $producto->id }}">
                        <td>{{$producto->nombre}}</td>
                        <td>
                            @can('productos.ver')
                                <a class="btn btn-info" href="{{ route('productos.ver',$producto->id) }}">Show</a>
                            @endcan
                            @can('productos.editar')
                                <a class="btn btn-primary" href="{{ route('productos.editar',$producto->id) }}">Edit</a>
                            @endcan
                            @can('productos.eliminar')
                            <a href="javascript:void(0)" class="button btn btn-danger" data-id="{{$producto->id}}">Delete</a>
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
                {!! $productos->links() !!}
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
        var producto_id = $(this).data('id');
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
                url: `{{url('admin/productos/eliminar/${producto_id}')}}`,
                success: function (data) {
                    $("#producto_id_" + producto_id).remove();
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