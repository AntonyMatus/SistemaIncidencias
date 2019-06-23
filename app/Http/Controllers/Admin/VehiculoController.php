<?php

namespace Laxcore\Http\Controllers\Admin;

use Laxcore\Http\Controllers\Controller;
use Xhunter\Repositories\Vehiculos\VehiculoRepository;
use Xhunter\Services\VehiculosService;
use TJGazel\Toastr\Facades\Toastr;
use Xhunter\Enumerable\EstatusVehiculo;
use Illuminate\Support\Facades\Storage;


class VehiculoController extends Controller
{
    protected $repository, $service;
    public function __construct(VehiculoRepository $repository, VehiculosService $service)
    {
        $this->middleware('permission:vehiculos.index');
        $this->middleware('permission:vehiculos.ver', ['only' => ['getVer']]);
        $this->middleware('permission:vehiculos.crear', ['only' => ['getAgregar', 'postAgregar']]);
        $this->middleware('permission:vehiculos.editar', ['only' => ['getEditar', 'postEditar']]);
        $this->middleware('permission:vehiculos.eliminar', ['only' => ['getEliminar']]);
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getindex()
    {
        $vehiculos = $this->repository->all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function getVer($id)
    {
            $modelo = $this->repository->find($id);
            if($modelo !== null){
                return view()->make('vehiculos.ver',compact('modelo'));
            }
            Toastr::error(_i("El Registro seleccionado no existe"));
            return redirect()->route('vehiculos.index');
    }

    public function getAgregar()
    {
        //obtengo todos los Valores del Enumerable
        $Estatus = EstatusVehiculo::getValues();
        return view('vehiculos.agregar', compact('Estatus'));
    }

    public function postAgregar()
    {
        $data = request()->except('_token');
        if(request()->hasFile('imagen')){
            $path = \Storage::disk('public')->putFileAs('uploads/vehiculos',$data['imagen'], uniqid().str_replace(' ', '-',$data['imagen']->getClientOriginalName()));
            $data['imagen'] =$path;
        }
        $modelo = $this->service->create($data);
        if (null !== $modelo) {
            Toastr::success('Los datos se han guardado con éxito!','Creado con Exito');
            return redirect()->route('vehiculos.index');
        } else {
            Toastr::warning($this->service->getMessages()->first(),'Upss Algo Salió Mal!');
            return redirect()->route('vehiculos.agregar')->withInput();
        }
    }
    public function getEditar($id)
    {
        $modelo = $this->repository->find($id);
        if (null !== $modelo) {
            return view('vehiculos.editar', compact('modelo'));
        }
        Toastr::error(_i('Registro no encontrado'));
        return redirect()->route('vehiculos.index');
    }
    public function postEditar($id)
    {
        $data = request()->all();     
        if(request()->hasFile('imagen')){
            $vehiculo = $this->repository->find($id);
            Storage::delete('public/'.$vehiculo->imagen);
            $path = \Storage::disk('public')->putFileAs('uploads/vehiculos',$data['imagen'], uniqid().str_replace(' ', '-',$data['imagen']->getClientOriginalName()));
            $data['imagen']= $path; 
        }
        $response = $this->service->update($id, $data);
        if ($response) {
            Toastr::success(__('Registro actualizado'));
        } else {
            Toastr::error($this->service->getMessages()->first());
            return redirect()->route('vehiculos.editar', [
                'id' => $id
            ])->withInput();
        }
        return redirect()->route('vehiculos.index');
    }
    public function getEliminar($id)
    {
        $vehiculo = $this->repository->find($id);
        if(Storage::exists('public/'.$vehiculo->imagen)){
           Storage::delete('public/'.$vehiculo->imagen);
        }
        $deleted = $this->service->delete($id);
        if ($deleted == false) {
            Toastr::error(__($this->service->getMessages()->first('errors')));
        }
        return redirect()->route('vehiculos.index');
    }
}
