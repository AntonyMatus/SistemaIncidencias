<?php

namespace Xhunter\Abstracts;

use Illuminate\Support\MessageBag;
use Xhunter\Contracts\IValidator;

abstract class AValidator implements IValidator
{
    protected $validator;
    protected $rules = [];
    protected $data = [];
    protected $messages = [];
    protected $errors;

    public function __construct()
    {
        $this->errors = new MessageBag();
    }

    /**
     * @param $action
     * @return boolean
     * @throws \Exception
     */
    public function success($action)
    {
        if (!isset($this->rules[$action])) throw new \Exception(_i('La accion del validator no existe'));
        $validator = \Validator::make($this->data, $this->rules[$action], $this->messages);
        $response = $validator->passes();
        if (!$response) $this->errors = $validator->errors();
        return $response;
    }

    /**
     * @param $action
     * @return boolean
     * @throws \Exception
     */
    public function fails($action)
    {
        if (!isset($this->rules[$action])) throw new \Exception(_i('La accion del validator no existe'));
        $validator = \Validator::make($this->data, $this->rules[$action], $this->messages);
        $response = $validator->fails();
        if ($response) $this->errors = $validator->errors();
        return $response;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function with($data = [])
    {
        if (is_array($data)) $this->data = $data;
        return $this;
    }

    /**
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }
}