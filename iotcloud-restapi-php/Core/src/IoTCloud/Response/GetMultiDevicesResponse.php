<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class GetMultiDevicesResponse extends BaseResponse
{

    /**
     * 此任务要创建的总设备个数
     */
    private $totalDevNum;

    /**
     * 设备详细信息(数组)，数组元素为CreateDeviceInfo实例
     */
    private $listCreateDeviceInfo;

    /**
     * GetMultiDevicesResponse constructor.
     */
    public function __construct()
    {
    }

    /**
     * 获取此任务要创建的总设备个数
     */
    public function getTotalDevNum()
    {
        return $this->totalDevNum;
    }

    /**
     * 设置此任务要创建的总设备个数
     * @param $totalDevNum
     */
    public function setTotalDevNum($totalDevNum)
    {
        $this->totalDevNum = $totalDevNum;
    }

    /**
     * 获取设备详细信息
     * @return array 数组元素为CreateDeviceInfo实例
     */
    public function getListCreateDeviceInfo()
    {
        return $this->listCreateDeviceInfo;
    }

    /**
     * 设置设备详细信息
     * @param $listCreateDeviceInfo 数组，数组元素为CreateDeviceInfo实例
     */
    public function setListCreateDeviceInfo($listCreateDeviceInfo)
    {
        $this->listCreateDeviceInfo = $listCreateDeviceInfo;
    }


}