<?php

namespace App\Exceptions;

use Exception;

class MitraFormException extends Exception
{
    public $message = '';

    public $code = 422;

    public $data = [];

    public function __construct($message, $code = null, $request = [])
    {
        parent::__construct($message, $code);

        $this->message = $message;
        $this->data = $request;
        if ($code) {
            $this->code = $code;
        }
    }
}
