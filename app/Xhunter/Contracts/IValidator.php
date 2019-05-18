<?php

namespace Xhunter\Contracts;


use Illuminate\Support\MessageBag;

interface IValidator
{
    /**
     * @param $action
     * @return boolean
     */
    public function success($action);

    /**
     * @param $action
     * @return boolean
     */
    public function fails($action);

    /**
     * @param array $data
     * @return $this
     */
    public function with($data = []);

    /**
     * @return MessageBag
     */
    public function getErrors();
}