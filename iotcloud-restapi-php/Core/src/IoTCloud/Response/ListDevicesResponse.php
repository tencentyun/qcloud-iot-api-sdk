<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class ListDevicesResponse extends BaseResponse
{
    /**
     * 设备总数
     */
    private $totalCnt;

    /**
     * 设备对象的数组，数组元素为DeviceInfo实例
     */
    private $devices;

    public function __construct()
    {
    }

    /**
     * 获取设备总数
     */
    public function getTotalCnt()
    {
        return $this->totalCnt;
    }

    /**
     * 设置设备总数
     * @param $totalCnt
     */
    public function setTotalCnt($totalCnt)
    {
        $this->totalCnt = $totalCnt;
    }

    /**
     * 获取设备对象的数组
     * @return array 数组元素为DeviceInfo实例
     */
    public function getDevices()
    {
        return $this->devices;
    }

    /**
     * 设置设备对象的数组
     * @param $devices
     */
    public function setDevices($devices)
    {
        $this->devices = $devices;
    }


}