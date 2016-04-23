<?php

namespace App;

use Illuminate\Support\Facades\Response as Response;
use Illuminate\Support\Facades\Lang;

class ApiResponse extends Response
{
    const CODE_VALIDATION_ERROR = 101;
    const POST_SUCCESS_STATUS_CODE = 201;

    const TYPE_ERROR = 'error';

    const STATUS_TYPE_ERROR     = 'error';
    const STATUS_TYPE_SUCCESS   = 'success';
    const STATUS_TYPE_INFO      = 'info';

    /**
     * HTTP Status code
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * data to be sent
     *
     * @var array
     */
    protected $data = array();

    /**
     * messages to be sent
     *
     * @var array
     */
    protected $status =  array();

    /**
     * Getter for statusCode
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Generates a response with a 403 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorForbidden()
    {
        return $this->setStatusCode(403)->send();
    }

    /**
     * Generates a response with a 500 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorInternalError()
    {
        return $this->setStatusCode(500)->send();
    }

    /**
     * Generates a response with a 404 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorNotFound()
    {
        return $this->setStatusCode(404)->send();
    }

    /**
     * Generates a response with a 401 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorUnauthorized()
    {
        return $this->setStatusCode(401)->send();
    }

    /**
     * Generates a response with a 400 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorWrongArgs()
    {
        return $this->setStatusCode(400)->send();
    }

    /**
     * Generates a response with a 410 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorGone()
    {
        return $this->setStatusCode(410)->send();
    }

    /**
     * Generates a response with a 405 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorMethodNotAllowed()
    {
        return $this->setStatusCode(405)->send();
    }

    /**
     * Generates a Response with a 431 HTTP header and a given message.
     *
     * @param string $message
     * @return mixed
     */
    public function errorUnwillingToProcess()
    {
        return $this->setStatusCode(431)->send();
    }

    /**
     * set data to be send
     *
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * merge current data with given data
     *
     * @param $data
     * @return $this
     */
    public function mergeData($data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * build and send the response
     *
     * @return mixed
     */
    public function send()
    {
        $response = array(
            'status'    => $this->status,
            'data'      => $this->data,
        );

        return self::json($response, $this->statusCode);
    }

    /**
     * add status message
     *
     * @param $type
     * @param $code
     * @param $message
     * @param string $extra_data
     * @return $this
     */
    protected function setStatus($type, $code, $message, $extra_data = '')
    {
        $this->status[] = [
            'type'          => $type,
            'code'          => $code,
            'message'       => $message,
            'extra_data'    => $extra_data
        ];

        return $this;
    }

    /**
     * @param $code
     * @param $message
     * @param string $extra_data
     * @return ApiResponse
     */
    public function setError($code, $message, $extra_data = '')
    {
        return $this->setStatus(self::STATUS_TYPE_ERROR, $code, $message, $extra_data);
    }

    /**
     * set errors and send response for validation errors
     *
     * @param $validatorData
     * @return mixed
     */
    public function sendValidationError($validatorData)
    {
        $msg = Lang::get('api.errors.input_validator');
        $this->setError(self::CODE_VALIDATION_ERROR, $msg, $validatorData);
        return $this->errorWrongArgs();
    }
}