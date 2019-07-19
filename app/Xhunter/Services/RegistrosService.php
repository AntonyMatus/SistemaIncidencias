<?php

namespace Xhunter\Services;

use Xhunter\Abstracts\AService;
use Xhunter\Repositories\Registros\RegistroRepository as RegistrosRepository;
use Xhunter\Validators\Registros\RegistrosValidator as RegistrosValidator;

class RegistrosService extends AService {

    public function __construct(RegistrosRepository $repository, RegistrosValidator $validator)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try
        {
            if($this->validator->with($data)->success('create')){
                \DB::beginTransaction();
                $result = $this->repository->create($data);
                $result->vehiculos()->attach($data['vehiculo_unidad']);
                \DB::commit();
                return $result;
            }
            $this->messages = $this->validator->getErrors();
            return null;
        }
        catch(\Exception $e)
        {
            \Log::error($e);
            \DB::rollBack();
            $this->addMessage('Error', $e->getMessage());
            return null;
        }
    }
    
    public function update($id, array $data)
    {
        try {
            if($this->validator->with($data)->success('update')){
                \DB::beginTransaction();
              $this->repository->update($id, $data);
             $result = $this->repository->find($id);
             $result->vehiculos()->sync($data['vehiculo_unidad']);
                \DB::commit();
                return $this->repository->find($id);
            }
            $this->messages = $this->validator->getErrors();
            return false;
        } catch (\Exception $e) {
            \Log::error($e);
            \DB::rollBack();
            $this->addMessage('Error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            \DB::beginTransaction();
            $result = $this->repository->find($id);
            $result->vehiculos()->detach();
            $this->repository->delete($id);
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e);
            $this->addMessage('Error', $e->getMessage());
            return false;
        }
    }

}