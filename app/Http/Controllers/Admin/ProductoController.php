<?php

namespace Laxcore\Http\Controllers\Admin;

use Laxcore\Http\Controllers\Controller;
use Xhunter\Repositories\Productos\ProductoRepository;
use Xhunter\Services\ProductosService;
use TJGazel\Toastr\Facades\Toastr;

class ProductoController extends Controller
{
    protected $repository, $service;

    public function __construct(ProductoRepository $repository, ProductosService $service)
    {
        $this->middleware('permission:productos.index');
        $this->middleware('permission:productos.ver', ['only' => ['getVer']]);
        $this->middleware('permission:productos.crear', ['only' => ['getAgregar', 'postAgregar']]);
        $this->middleware('permission:productos.editar', ['only' => ['getEditar', 'postEditar']]);
        $this->middleware('permission:productos.eliminar', ['only' => ['getEliminar']]);
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getIndex()
    {
        $productos = $this->repository->orderBy('nombre', 'ASC')->paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function getVer($id)
    {
        $modelo = $this->repository->find($id);
        if ($modelo !== null) {
            return view()->make('productos.ver', compact('modelo'));
        }

        Toastr::error(_i('El registro seleccionado no existe'));

        return redirect()->route('productos.index');
    }

    public function getAgregar()
    {
        return view('productos.agregar');
    }

    public function postAgregar()
    {
        $data = request()->all();
        $modelo = $this->service->create($data);

        if (null !== $modelo) {
            Toastr::success('Los datos se han guardado con éxito.!','Creado con Exito');
            return redirect()->route('productos.index');
        } else {
            Toastr::warning($this->service->getMessages()->first(),'Upss Algo Salió Mal!');
            return redirect()->route('productos.agregar')->withInput();
        }
    }


    public function getEditar($id)
    {
        $modelo = $this->repository->find($id);
        if (null !== $modelo) {
            return view('productos.editar', compact('modelo'));
        }
        Toastr::error(_i('Registro no encontrado'));
        return redirect()->route('productos.index');
    }

    public function postEditar($id)
    {
        $data = request()->all();
        $response = $this->service->update($id, $data);

        if ($response) {
            Toastr::success(__('Registro actualizado'));
        } else {
            Toastr::error($this->service->getMessages()->first());
            return redirect()->route('productos.editar', [
                'id' => $id
            ])->withInput();
        }

        return redirect()->route('productos.index');
    }

    public function getEliminar($id)
    {
        $deleted = $this->service->delete($id);
        if ($deleted == false) {
            Toastr::error(__($this->service->getMessages()->first('errors')));
        }
    }
}
