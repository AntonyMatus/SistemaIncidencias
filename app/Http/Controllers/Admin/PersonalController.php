<?php

namespace Laxcore\Http\Controllers\Admin;

use Laxcore\Http\Controllers\Controller;
use Xhunter\Repositories\Personal\PersonalRepository;
use Xhunter\Services\PersonalService;
use TJGazel\Toastr\Facades\Toastr;

class PersonalController extends Controller
{
    protected $repository, $service;

    public function __construct(PersonalRepository $repository, PersonalService $service)
    {
        $this->middleware('permission:personal.index');
        $this->middleware('permission:personal.crear', ['only' => ['getAgregar', 'postAgregar']]);
        $this->middleware('permission:personal.editar', ['only' => ['getEditar', 'postEditar']]);
        $this->middleware('permission:personal.eliminar', ['only' => ['getEliminar']]);
        $this->repository = $repository;
        $this->service = $service;
    }

    public function getIndex()
    {
        $personal = $this->repository->all();
        return view('personal.index', compact('personal'));
    }

    public function getAgregar()
    {
        return view('personal.agregar');
    }

    public function postAgregar()
    {
        $data = request()->all();
        $modelo = $this->service->create($data);
        if (null !== $modelo) {
            Toastr::success('Los datos se han guardado con éxito.!','Creado con Exito');
            return redirect()->route('personal.index');
        } else {
            Toastr::warning($this->service->getMessages()->first(),'Upss Algo Salió Mal!');
            return redirect()->route('personal.agregar')->withInput();
        }
    }

    public function getEditar($id)
    {
        $modelo = $this->repository->find($id);

        if (null !== $modelo) {
            return view('personal.editar', compact('modelo'));
        }
        Toastr::error(_i('Registro no encontrado'));
        return redirect()->route('personal.index');
    }

    public function postEditar($id)
    {
        $data = request()->all();

        $response = $this->service->update($id, $data);

        if ($response) {
            Toastr::success(__('Registro actualizado'));
        } else {
            Toastr::error($this->service->getMessages()->first());
            return redirect()->route('personal.editar', [
                'id' => $id
            ])->withInput();
        }
        return redirect()->route('personal.index');
    }

    public function getEliminar($id)
    {
        $deleted = $this->service->delete($id);
        if ($deleted == false) {
            Toastr::error(__($this->service->getMessages()->first('errors')));
        }
        return redirect()->route('personal.index');
    }
}
