<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class CreateDeviceResponse extends BaseResponse
{
    /**
     * 设备名称
     */
    private $deviceName;

    /**
     * 设备证书，用于 TLS 建立链接时校验客户端身份
     */
    private $deviceCert;

    /**
     * 设备私钥，用于 TLS 建立链接时校验客户端身份，腾讯云后台不保存，请妥善保管
     */
    private $devicePrivateKey;

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
     * @param
     */
    public function setDeviceName($deviceName)
    {
        $this->deviceName = $deviceName;
    }

    /**
     * 获取设备证书
     */
    public function getDeviceCert()
    {
        return $this->deviceCert;
    }

    /**
     * 设置设备证书
     * @param $deviceCert
     */
    public function setDeviceCert($deviceCert)
    {
        $this->deviceCert = $deviceCert;
    }

    /**
     * 获取设备私钥
     */
    public function getDevicePrivateKey()
    {
        return $this->devicePrivateKey;
    }

    /**
     * 设置设备私钥
     * @param $devicePrivateKey
     */
    public function setDevicePrivateKey($devicePrivateKey)
    {
        $this->devicePrivateKey = $devicePrivateKey;
    }

}