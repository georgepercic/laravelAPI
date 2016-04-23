<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Api extends Model implements ApiInterface {

    /**
     * @var
     */
    protected $model;

    /**
     * @param array $attributes
     * @throws \Exception
     */
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * Get validation rules
     * @return mixed
     */
    abstract function getValidationRules();

    /**
     * @return Model
     * @throws \Exception
     */
    public function makeModel()
    {
        $model = $this->model();

        if (!$model instanceof Model)
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function showAll($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function saveData(array $data) {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function updateData(array $data, $id, $attribute="") {

        if (empty($attribute))
        {
            $attribute = $this->model->getKeyName();
        }

        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteData($id) {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findData($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findByData($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }
}