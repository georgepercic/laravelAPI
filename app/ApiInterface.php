<?php

namespace App;

interface ApiInterface {

    public function showAll($columns = array('*'));

    public function saveData(array $data);

    public function updateData(array $data, $id);

    public function deleteData($id);

    public function findData($id, $columns = array('*'));

    public function findByData($field, $value, $columns = array('*'));
}