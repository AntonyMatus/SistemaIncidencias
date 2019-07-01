<?php
namespace Xhunter\Services;
use Xhunter\Abstracts\AService;
use Xhunter\Repositories\Personal\PersonalRepository as PersonalsRepository;
use Xhunter\Validators\Personal\PersonalValidator as PersonalsValidator;

class PersonalService extends AService {
    public function __construct(PersonalsRepository $repository, PersonalsValidator $validator){
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;
    }
    public function create(array $data){
        try
        {
            if(!$this->isValidUnique($data
            ['vehiculo_unidad'], 'vehiculos', 'vehiculo_unidad' ))
            {
                throw new \Exception('Ya existe un Vehiculo con el mismo nombre');
            }
            if($this->validator->with($data)->success('create')){
                \DB::beginTransaction();
                $result = $this->repository->create($data);
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
    public function update($id, array $data) {
        try { 
            
            if($this->validator->with($data)->success('update')) {
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
    public function delete($id) {
        try{
            \DB::beginTransaction();
            $this->repository->delete($id);
            \DB::commit();
            return true;
        }catch (\Exception $e){
            \DB::rollBack();
            \Log::error($e);
            $this->addMessage('Error', $e->getMessage());
            return false;
        }
    }
}