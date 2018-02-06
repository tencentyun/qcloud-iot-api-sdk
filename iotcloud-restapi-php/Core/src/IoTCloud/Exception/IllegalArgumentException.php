<?php

namespace TXIoTCloud\Exception;

/**
 * Class IllegalArgumentException ：无效参数异常
 * @package IoTCloud\Exception
 */
class IllegalArgumentException extends \Exception
{

    /**
     * IllegalArgumentException constructor.
     * @param $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }

}