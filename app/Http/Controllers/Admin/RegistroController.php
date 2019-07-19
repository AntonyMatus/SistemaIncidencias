<?php

namespace Laxcore\Http\Controllers\Admin;

use Laxcore\Http\Controllers\Controller;
use Xhunter\Repositories\Registros\RegistroRepository;
use Xhunter\Services\RegistrosService;
use TJGazel\Toastr\Facades\Toastr;

class RegistroController extends Controller
{
    protected $repository, $service;
    public function __construct(RegistroRepository $repository, RegistrosService $service)
    {
        $this->middleware('permission:registros.index');
        $this->middleware('permission:registros.ver', ['only' => ['getVer']]);
        $this->middleware('permission:registros.crear', ['only' => ['getAgregar', 'postAgregar']]);
        $this->middleware('permission:registros.editar', ['only' => ['getEditar', 'postEditar']]);
        $this->middleware('permission:registros.eliminar', ['only' => ['getEliminar']]);
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getindex()
    {
        $registros = $this->repository->all();
        return view('registros.index', compact('registros'));
    }

    public function getVer($id)
    {
        $modelo = $this->repository->find($id);
       
         foreach($modelo->vehiculos as $vehiculos)
        {
            $unidades = $vehiculos->vehiculo_unidad;
        }

        if($modelo !== null)
        {
            return view()->make('registros.ver', compact('modelo', 'unidades'));
        }
        Toastr::error(_i('El registro seleccionado no existe'));
        return redirect()->route('registros.index');
    }

    public function getAgregar()
    {
        return view('registros.agregar');
    }

    public function postAgregar()
    {
        $data = request()->all();
        $modelo = $this->service->create($data);
       
        if(null !== $modelo)
        {
            Toastr::success('Los datos se han guardado con éxito.!','Creado con Exito');
            return redirect()->route('registros.index');
        } else {
            Toastr::warning($this->service->getMessages()->first(), 'Upss Algo Salió Mal!');
            return redirect()->route('registros.agregar')->withInput();
        }
    }

    public function getEditar($id)
    {
        $modelo = $this->repository->find($id);
        if(null !== $modelo)
        {
            return view('registros.editar', compact('modelo'));
        }
        Toastr::error(_i('Registro no encontrado'));
        return redirect()->route('registros.index');
    }

    public function postEditar($id)
    {
        $data = request()->all();
        $response = $this->service->update($id, $data);
        if($response){
            Toastr::success(__('Registro actualizado'));
        } else {
            Toastr::error($this->service->getMessages()->first());
            return redirect()->route('registros.editar', [ 'id' => $id])->withInput();
        } 
        return redirect()->route('registros.index');
    }

    public  function getEliminar($id)
    {
        $delete = $this->service->delete($id);
        if($delete ==  false){
            Toastr::error(__($this->service->getMessages()->first()));
        }
        return redirect()->route('registros.index');
    }
}
