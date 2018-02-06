<?php

namespace TXIoTCloud\Exception;


class ClientException extends \Exception
{

    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

}