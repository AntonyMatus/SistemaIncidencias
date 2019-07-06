<?php
namespace Laxcore\Http\Controllers\Admin;
use Laxcore\Http\Controllers\Controller;
use Xhunter\Repositories\Emergencias\EmergenciaRepository;
use Xhunter\Services\EmergenciasService;
use TJGazel\Toastr\Facades\Toastr;

class EmergenciasController extends Controller
{
    protected $repository, $service;
    public function __construct(EmergenciaRepository $repository, EmergenciasService $service)
    {
        $this->middleware('permission:emergencia.index');
        $this->middleware('permission:emergencia.crear', ['only' => ['getAgregar', 'postAgregar']]);
        $this->middleware('permission:emergencia.editar', ['only' => ['getEditar', 'postEditar']]);
        $this->middleware('permission:emergencia.eliminar', ['only' => ['getEliminar']]);
        $this->repository = $repository;
        $this->service = $service;
    }
    
    public function getIndex()
    {
        $emergencias = $this->repository->all();
        return view('emergencias.index', compact('emergencias'));
    }

    public function getAgregar()
    {
        return view('emergencias.agregar');
    }

    public function postAgregar()
    {
        $data = request()->all();
        $modelo = $this->service->create($data);
        if (null !== $modelo) {
            Toastr::success('Los datos se han guardado con éxito.!', 'Creado con Exito');
            return redirect()->route('emergencias.index');
        } else {
            Toastr::warning($this->service->getMessages()->first(), 'Upps Algo Salió Mal!');
            return redirect()->route('emergencias.agregar')->withInput();
        }
    }

    public function getEditar($id)
    {
        $modelo = $this->repository->find($id);
        if (null !== $modelo) {
            return view('emergencias.editar', compact('modelo'));
        }
        Toastr::error(_i('Registro no encontrado'));
        return redirect()->route('emergencias.index');
    }

    public function postEditar($id)
    {
        $data = request()->all();
        $response = $this->service->update($id, $data);
        if ($response) {
            Toastr::success(__('Registro actualizado'));
        } else {
            Toastr::error($this->service->getMessages()->first());
            return redirect()->route('emergencias.editar', [
                'id' => $id
            ])->withInput();
        }
        return redirect()->route('emergencias.index');
    }
    public function getEliminar($id)
    {
        $deleted = $this->service->delete($id);
        if ($deleted == false) {
            Toastr::error(__($this->service->getMessages()->first('errors')));
        }
        return redirect()->route('emergencias.index');
    }
}
