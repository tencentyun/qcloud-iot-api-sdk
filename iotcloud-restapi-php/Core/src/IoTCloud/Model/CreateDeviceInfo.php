<?php

namespace TXIoTCloud\Model;


class CreateDeviceInfo
{

    /**
     * 设备名称
     */
    private $deviceName;

    /**
     * 设备证书
     */
    private $deviceCert;

    /**
     * 设备私钥
     */
    private $devicePrivateKey;

    /**
     * 执行结果，参考 CreateDevice 接口的返回码定义
     */
    private $result;

    /**
     * 错误信息
     */
    private $errMsg;

    /**
     * ListCreateDeviceInfo constructor.
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

    /**
     * 获取执行结果
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * 设置执行结果
     * @param $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * 获取错误信息
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }

    /**
     * 设置错误信息
     * @param $errMsg
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;
    }

}