<?php

namespace Xhunter\Contracts;


use Illuminate\Database\Eloquent\Collection;

interface IService
{
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     * @return boolean
     */
    public function update($id,array $data);

    public function find($id);

    /**
     * @param $id
     * @return boolean
     */
    public function delete($id);

    /**
     * @return Collection
     */
    public function getAll();
}