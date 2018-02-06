<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class CreateDeviceRequest extends BaseRequest
{

    /**
     * 设备名称，命名规则：[a-zA-Z0-9:_-]{1,48}
     */
    protected $deviceName;

    /**
     * 产品ID，创建产品时腾讯云为用户分配全局唯一的 ID
     */
    protected $productID;

    /**
     * CreateDeviceRequest constructor.
     * @param $timestamp     当前unix时间戳
     * @param $nonce         随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $deviceName    设备名称
     * @param $productID     产品ID
     */
    public function __construct($timestamp, $nonce, $deviceName, $productID)
    {
        parent::__construct($timestamp, $nonce);
        $this->deviceName = $deviceName;
        $this->productID = $productID;
    }

    /**
     * 获取设备名称
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * 设置产品名称
     * @param
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;
    }

    /**
     * 获取产品ID
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * 设置产品ID
     * @param  $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }


}