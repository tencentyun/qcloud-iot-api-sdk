<?php

namespace TXIoTCloud\Request;

require_once "GetDeviceShadowRequest.php";

class UpdateDeviceShadowRequest extends GetDeviceShadowRequest
{

    /**
     * 虚拟设备的状态，json格式，由desired结构组成
     */
    private $state;

    /**
     * 当前版本号，需要和后台的version保持一致，才能更新成功
     */
    private $version;

    /**
     * UpdateDeviceShadowRequest constructor.
     * @param $timestamp     当前unix时间戳
     * @param $nonce         随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $productID     产品ID
     * @param $deviceName    设备名称
     * @param $state         虚拟设备的状态，json格式，由desired结构组成
     * @param $version       当前版本号
     */
    public function __construct($timestamp, $nonce, $productID, $deviceName, $state, $version)
    {
        parent::__construct($timestamp, $nonce, $productID, $deviceName);
        $this->productID = $productID;
        $this->deviceName = $deviceName;
        $this->state = $state;
        $this->version = $version;
    }

    /**
     * 获取虚拟设备状态
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * 设置虚拟设备状态
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * 获取版本号
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * 设置版本号
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }


}