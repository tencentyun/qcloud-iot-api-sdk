<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class GetDeviceShadowResponse extends BaseResponse
{
    /**
     * 虚拟设备当前状态
     */
    protected $state;

    /**
     * 虚拟设备属性的元信息，包括创建时间或者最后修改时间
     */
    protected $metadata;

    /**
     * 服务器返回时间
     */
    protected $timestamp;

    /**
     * 当前虚拟设备的版本号
     */
    protected $version;

    public function __construct()
    {
    }

    /**
     * 获取虚拟设备当前状态
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * 设置虚拟设备当前状态
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * 获取虚拟设备属性的元信息，包括创建时间或者最后修改时间
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * 设置虚拟设备属性的元信息，包括创建时间或者最后修改时间
     * @param $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * 获取服务器返回时间
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * 设置服务器返回时间
     * @param $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * 获取当前虚拟设备的版本号
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * 设置当前虚拟设备的版本号
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

}