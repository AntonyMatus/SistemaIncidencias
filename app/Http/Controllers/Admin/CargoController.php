<?php

namespace Laxcore\Http\Controllers\Admin;

use Laxcore\Http\Controllers\Controller;
use Xhunter\Repositories\Cargos\CargoRepository;
use Xhunter\Services\CargosService;
use TJGazel\Toastr\Facades\Toastr;

class CargoController extends Controller
{
    protected $repository, $service;

    public function __construct(CargoRepository $repository, CargosService $service)
    {
        $this->middleware('permission:cargos.index');
        $this->middleware('permission:cargos.crear', ['only' => ['getAgregar', 'postAgregar']]);
        $this->middleware('permission:cargos.editar', ['only' => ['getEditar', 'postEditar']]);
        $this->middleware('permission:cargos.eliminar', ['only' => ['getEliminar']]);
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getIndex()
    {
        $cargo = $this->repository->all();
        return view('cargos.index',compact('cargo'));
    }

    public function getAgregar()
    {
        return view('cargos.agregar');
    }

    public function postAgregar()
    {
        $data = request()->all();
        $modelo = $this->service->create($data);

        if (null !== $modelo) {
            Toastr::success('Los datos se han guardado con éxito.!','Creado con Exito');
            return redirect()->route('cargos.index');
        } else {
            Toastr::warning($this->service->getMessages()->first(),'Upss Algo Salió Mal!');
            return redirect()->route('cargos.agregar')->withInput();
        }
    }

    public function getEditar($id)
    {
        $modelo = $this->repository->find($id);
        if (null !== $modelo) {
            return view('cargos.editar', compact('modelo'));
        }
        Toastr::error(_i('Registro no encontrado'));
        return redirect()->route('cargos.index');
    }

    public function postEditar($id)
    {
        $data = request()->all();
        $response = $this->service->update($id, $data);

        if ($response) {
            Toastr::success(__('Registro actualizado'));
        } else {
            Toastr::error($this->service->getMessages()->first());
            return redirect()->route('cargos.editar', [
                'id' => $id
            ])->withInput();
        }
        return redirect()->route('cargos.index');
    }

    public function getEliminar($id)
    {
        $deleted = $this->service->delete($id);
        if ($deleted == false) {
            Toastr::error(__($this->service->getMessages()->first('errors')));
        }
        return redirect()->route('cargos.index');
    }
}
