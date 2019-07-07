<?php

namespace Xhunter\Services;

use Xhunter\Abstracts\AService;
use Xhunter\Repositories\Emergencias\EmergenciaRepository as EmergenciaRepository;
use Xhunter\Validators\Emergencias\EmergenciasValidator as EmergenciasValidator;

class EmergenciasService extends AService
{
    public function __construct(EmergenciaRepository $repository, EmergenciasValidator $validator)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            if(!$this->isValidUnique($data['tipo_emergencia'], 'emergencias', 'tipo_emergencia'))
            {
                throw new \Exception('Ya existe un Tipo de Emergencia con el mismo nombre.');
            }
            if($this->validator->with($data)->success('create'))
            {
                \DB::beginTransaction();
                $result = $this->repository->create($data);
                \DB::commit();
                return $result;
            }
            $this->messages = $this->validator->getErrors();
            return null;
        } 
        catch (\Exception $e) 
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
            if($this->validator->with($data)->success('update'))
            {
                \DB::beginTransaction();
                $this->repository->update($id, $data);
                \DB::commit();
                return $this->repository->find($id);
            }
            $this->messages = $this->validator->getErrors();
            return false;
        } catch (\Exception $e) {
            \Log::error($e);
            \DB::rollBack();
            $this->addMessage('Error', $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            \DB::beginTransaction();
            $this->repository->delete($id);
            \DB::commit();
            return true;
            } catch (\Exception $e)
            {
            \DB::rollBack();
            \Log::error($e);
            $this->addMessage('Error', $e->getMessage());
            return false;
        }
    }
}