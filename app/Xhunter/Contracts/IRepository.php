<?php

namespace Xhunter\Contracts;

interface IRepository
{
    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function all($columns = array('*'));

    public function orderBy($column, $sort = 'asc');

    public function paginate($perPage = 15, $columns = array('*'));

    public function find($id, $columns = array('*'));

    public function findBy($column, $value, $columns = array('*'));

    public function findAllBy($column, $value, $columns = array('*'));

    public function findByWhere(array $where, $columns = array('*'));
}