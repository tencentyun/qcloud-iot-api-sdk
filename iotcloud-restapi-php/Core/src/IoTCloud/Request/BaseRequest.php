<?php

namespace TXIoTCloud\Request;

/**
 * Class BaseRequest ： 请求基类
 * @package IoTCloud\Request
 */
class BaseRequest
{

    /**
     * 当前unix时间戳
     */
    protected $timestamp;

    /**
     * 随机正整数，与timestamp联合起来，用于防止重放攻击
     */
    protected $nonce;

    /**
     * BaseRequest constructor.
     * @param $timestamp  当前unix时间戳
     * @param $nonce      随机正整数，与timestamp联合起来，用于防止重放攻击
     */
    public function __construct($timestamp, $nonce)
    {
        $this->timestamp = $timestamp;
        $this->nonce = $nonce;
    }

    /**
     * 获取当前unix时间戳
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * 设置当前unix时间戳
     * @param
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * 获取随机正整数，与timestamp联合起来，用于防止重放攻击
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * 设置随机正整数，与timestamp联合起来，用于防止重放攻击
     * @param
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
    }

}