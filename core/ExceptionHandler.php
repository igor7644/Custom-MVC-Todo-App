<?php


namespace App\Core;
use Throwable;

class ExceptionHandler extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function handle()
    {
        $message = $this->getMessage();
        $statusCode= $this->getCode();
        $errorLine = $this->getLine();
        $fullMessage = "Something went wrong! \n Details: {$message} \n Status Code: {$statusCode} \n Error Line: {$errorLine}";
        return $fullMessage;
    }

}