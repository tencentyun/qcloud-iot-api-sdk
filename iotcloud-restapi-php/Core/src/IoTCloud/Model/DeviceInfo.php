<?php

namespace TXIoTCloud\Model;


class DeviceInfo
{
    /**
     * 设备名称
     */
    private $deviceName;

    /**
     * 产品ID
     */
    private $productID;

    /**
     * DeviceInfo constructor.
     */
    public function __construct()
    {
    }

    /**
     * 获取设备名称
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * 设置设备名称
     * @param $deviceName
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
     * @param $productID
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }


}