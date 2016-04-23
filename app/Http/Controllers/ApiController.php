<?php

namespace App\Http\Controllers;

use Validator;
use Log;
use Exception;
use App\Api;
use App\ApiResponse;
use Illuminate\Http\Request;

class ApiController extends Controller implements ApiControllerInterface {

    const VERSION_1         = 1;
    const DEFAULT_VERSION   = self::VERSION_1;

    protected $model;

    protected $response;

    public function __construct(Api $model) {
        if (!$model instanceof Api) {
            throw new \Exception("Class {$model} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        $this->response = new ApiResponse();

        $this->model = $model;
    }

    public function index()
    {
        try
        {
            $data = $this->model->showAll();
            $this->response->setData($data);
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return $this->response->errorInternalError();
        }

        return $this->response->send();
    }

    public function makeValidation(array $data, array $rules)
    {
        return Validator::make($data, $rules);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $rules = $this->model->getValidationRules();

        $validator = $this->makeValidation($data, $rules);

        if($validator->fails())
        {
            return $this->response->sendValidationError($validator->errors());
        }

        try
        {
            $entity = $this->model->saveData($data);
            // SEEMEk: check the update
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return $this->response->errorInternalError();
        }

        $this->response->setData(['entity' => json_encode($entity)]);
        $this->response->setStatusCode(ApiResponse::POST_SUCCESS_STATUS_CODE);
        return $this->response->send();
    }

    public function show($id)
    {
        try
        {
            $data = $this->model->findData($id);
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return $this->response->errorInternalError();
        }

        $this->response->setData($data);
        return $this->response->send();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try
        {
            $entity = $this->model->updateData($data, $id);
            // SEEMEk: check for the result
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return $this->response->errorInternalError();
        }

        $this->response->setData(['entity' => json_encode($entity)]);
        return $this->response->send();
    }

    public function destroy($id)
    {
        try
        {
            $this->model->deleteData($id);
            // SEEMEk: check for response
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
            return $this->response->errorInternalError();
        }

        return $this->response->send();
    }
}