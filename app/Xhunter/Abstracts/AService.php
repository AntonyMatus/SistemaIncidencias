<?php

namespace Xhunter\Abstracts;

use Carbon\Carbon;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
use Xhunter\Contracts\IRepository;
use Xhunter\Contracts\IService;
use Xhunter\Contracts\IValidator;

abstract class AService implements IService
{
    /**
     * @var IRepository $repository
     */
    protected $repository;
    /**
     * @var IValidator $validator
     */
    protected $validator;
    /**
     * @var MessageBag $messages
     */
    protected $messages;

    public function __construct()
    {
        $this->init();
    }

    protected function inErrorCase(\Exception $e){
        $message = $e->getMessage();
        \Log::error($message);
        $this->messages->add('error', $message);
    }

    public function create(array $data){
        $result = false;
        try{
            if ($this->validator->with($data)->fails('create')) throw new \Exception(_i('La informacion no es valida.'));
            $result = $this->repository->create($data);
        }
        catch (\Exception $e){
            $this->inErrorCase($e);
        }
        return $result;
    }

    public function update($id,array $data){
        $result = null;
        try{
            $registry = $this->repository->find($id);
            if (null === $registry) throw new \Exception(_i('El registro no existe.'));
            if ($this->validator->with($data)->fails('update')) throw new \Exception(_i('La informacion no es valida.'));
            $result = $registry->update($data);
        }
        catch (\Exception $e){
            $this->inErrorCase($e);
        }
        return $result;
    }

    public function find($id){
        return $this->repository->find($id);
    }

    public function delete($id){
        $result = null;
        try{
            $registry = $this->repository->find($id);
            if (null === $registry) throw new \Exception(_i('El registro no existe.'));
            $result = $registry->delete();
        }
        catch (\Exception $e){
            $this->inErrorCase($e);
        }
        return $result;
    }

    public function getAll(){
        return $this->repository->all();
    }

    /**
     * @return $this
     */
    private function init()
    {
        $this->messages = new MessageBag();

        return $this;
    }

    /**
     * @param $key
     * @param $message
     * @return $this
     */
    protected function addMessage($key, $message)
    {
        if ($this->messages instanceof MessageBag) {
            $this->messages->add($key, $message);
        }

        return $this;
    }

    /**
     * @param $array
     * @param $client_format
     * @param $db_format
     * @return $array
     */
    protected function dateTrait(array $array, $client_format = 'd-m-Y', $db_format = 'Y-m-d')
    {
        foreach ($array as $key => $value)
        {
            if (!is_string($value)) continue;
            if (preg_match('/^(date|fecha).*/', $key))
            {
                if (!empty($value))
                {
                    $array[$key] = Carbon::createFromFormat($client_format, $value)->format($db_format);
                }
            }
        }
        return $array;
    }

    /**
     * @return MessageBag
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param array $array
     * @return array
     */
    protected function clearNullValues(array &$array)
    {
        foreach ($array as $key => $value)
        {
            if (is_array($value)) $this->clearNullValues($array[$key]);
            else if (null === $value) unset($array[$key]);
        }
        return $array;
    }

    public function getPaginate($limit = 15, array $searched = [])
    {
        return $this->repository->pushCriteria(new SearchCriteria($searched))->paginate($limit);
    }

    /** Permite validar si el valor es único en una tabla de la base de datos en base a una columna dada
     * @param $value El valor que puede repetirse o no
     * @param $table La tabla en donde se buscará el valor
     * @param $column La columna especifica a evaluar
     * @param null $id El registro a ignorar en base al id dado
     * @return bool
     */
    protected function isValidUnique($value, $table, $column, $id = null)
    {
        return \Validator::make([ $column => $value ], [
            $column => [
                Rule::unique($table, $column)->ignore($id)
            ]
        ])->passes();
    }
}