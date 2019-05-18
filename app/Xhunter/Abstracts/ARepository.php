<?php

namespace Xhunter\Abstracts;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Xhunter\Contracts\IRepository;

abstract class ARepository implements IRepository
{
    /**
     * @var App
    */
    private $app;

    /**
     * @var
    */
    protected $model;

    /**
     * @param App $app
     * @throws Xhunter\Abstracts\Exceptions\RepositoryException
    */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Especifique el nombre de clase del modelo
     *
     * @return mixed
    */
    abstract public function model();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
    */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} debe ser una instancia de " . Model::class);
        }

        return $this->model = $model;
    }

    /**
     * @param array $columns
     * @return mixed
    */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /** Permite ordenar los resultados de la consulta por una columna dada
     * @param string $column La columna por la que será ordenado los resultados de la consulta
     * @param string $sort Controla la dirección del ordenamiento, puede ser 'asc' o 'desc'
     * @return Collection Las filas de la base de datos despues de aplicar los criterias ordenado
    */
    public function orderBy($column, $sort = 'asc')
    {
        return $this->model->orderBy($column, $sort);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
    */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    /** Crea un registro en la base de datos
     * @param $id
     * @param array $data
     * @return boolean Si fue exitoso o no
    */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /** Actualiza un registro en la base de datos
     * @param $id
     * @param array $data
     * @return boolean Si fue exitoso o no
    */
    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);

    }

    /** Borra un registro de la base de datos, si el modelo tiene softdeletes activado aplica softdelete en lugar de borrar
     * @param $id
     * @return boolean Si fue exitoso o no
    */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /** Busca un registro en especifico
     * @example Encuentra película por film_id: $this->film->find($id);
     * @example También puede elegir qué columnas buscar:
     * $this->film->find($id, ['title', 'description', 'release_date']);
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /** Obtener una sola fila por los criterios de una sola columna.
     * @example $this->film->findBy('title', $title);
     * @param $columna
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($column, $value, $columns = array('*'))
    {
        return $this->model->where($column, $value)->get($columns)->first();
    }

    /** Puede obtener todas las filas por un solo criterio de columna.
     * @example $this->film->findAllBy('author_id', $author_id);
     * @param $columna
     * @param $value
     * @param array $columns
     * @return mixed
    */
    public function findAllBy($column, $value, $columns = array('*'))
    {
        return $this->model->where($column, $value)->get($columns);
    }

    /** Obtener todos los resultados por múltiples campos
     * @example $this->film->findWhere([
     *        'author_id' => $author_id,
     *       ['year','>',$year]
     *  ]);
     * @param array $where campos a buscar
     * @param $columns valores de busqueda
     * @param mixed
    */
    public function findByWhere(array $where, $columns = ['*'])
    {
        return $this->model->where($where)->get($columns);
    }
}