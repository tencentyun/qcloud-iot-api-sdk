<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class CreateMultiDeviceRequest extends BaseRequest
{

    /**
     * 产品ID。创建产品时腾讯云为用户分配全局唯一的 ID
     */
    private $productID;

    /**
     * 批量创建的设备名数组，单次最多创建 100 个设备。命名规则：[a-zA-Z0-9:_-]{1,48}
     */
    private $listDeviceName;

    /**
     * CreateMultiDevice constructor.
     * @param $timestamp      当前unix时间戳
     * @param $nonce          随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $productID      产品ID
     * @param $listDeviceName 设备名数组
     */
    public function __construct($timestamp, $nonce, $productID, $listDeviceName)
    {
        parent::__construct($timestamp, $nonce);
        $this->productID = $productID;
        $this->listDeviceName = $listDeviceName;
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

    /**
     * 获取设备名数组
     */
    public function getListDeviceName()
    {
        return $this->listDeviceName;
    }

    /**
     * 设置设备名数组
     * @param $listDeviceName
     */
    public function setListDeviceName($listDeviceName)
    {
        $this->listDeviceName = $listDeviceName;
    }


}