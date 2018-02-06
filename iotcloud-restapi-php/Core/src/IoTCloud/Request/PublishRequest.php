<?php

namespace TXIoTCloud\Request;

require_once "BaseRequest.php";

class PublishRequest extends BaseRequest
{

    /**
     * 消息发往的主题。命名规则：productID/${deviceName}/[a-zA-Z0-9:_-]{1,128}
     */
    private $topic;

    /**
     * 消息内容
     */
    private $payload;

    /**
     * 产品ID
     */
    private $productID;

    /**
     * 设备名称
     */
    private $deviceName;

    /**
     * PublishRequest constructor.
     * @param $timestamp     当前unix时间戳
     * @param $nonce         随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param $topic         消息发往的主题
     * @param $payload       消息内容
     * @param $productID     产品ID
     * @param $deviceName    设备名称
     */
    public function __construct($timestamp, $nonce, $topic, $payload, $productID, $deviceName)
    {
        parent::__construct($timestamp, $nonce);
        $this->topic = $topic;
        $this->payload = $payload;
        $this->productID = $productID;
        $this->deviceName = $deviceName;
    }

    /**
     * 获取消息发往的主题
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * 设置消息发往的主题
     * @param $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * 获取消息内容
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * 设置消息内容
     * @param $payload
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;
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

}