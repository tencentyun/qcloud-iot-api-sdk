<?php

namespace TXIoTCloud\Request;

require_once "CreateDeviceRequest.php";

class DeleteDeviceRequest extends CreateDeviceRequest
{

    /**
     * CreateDeviceRequest constructor.
     * @param $timestamp     当前unix时间戳
     * @param $nonce         随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $deviceName    设备名称
     * @param $productID     产品ID
     */
    public function __construct($timestamp, $nonce, $deviceName, $productID)
    {
        parent::__construct($timestamp, $nonce, $deviceName, $productID);
    }

}