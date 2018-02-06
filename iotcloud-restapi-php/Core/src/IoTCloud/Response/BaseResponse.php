<?php

namespace TXIoTCloud\Response;

/**
 * Class BaseResponse : 响应基类
 * @package IoTCloud\Response
 */
class BaseResponse
{

    /**
     * 公共错误码，0表示成功，其他值表示失败
     */
    protected $code;

    /**
     * 模块信息错误描述，格式为 "(模块错误码)模块错误信息"
     */
    protected $message;

    /**
     * 模块错误码的英文描述
     */
    protected $codeDesc;

    /**
     * BaseResponse constructor.
     * @param $code        公共错误码，0表示成功，其他值表示失败
     * @param $message     模块信息错误描述，格式为 "(模块错误码)模块错误信息"
     * @param $codeDesc    模块错误码的英文描述
     */
    public function __construct($code, $message, $codeDesc)
    {
        $this->code = $code;
        $this->message = $message;
        $this->codeDesc = $codeDesc;
    }

    /**
     * 获取公共错误码
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * 设置公共错误码
     * @param
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * 获取模块错误信息描述
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * 设置模块错误信息描述
     * @param
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * 获取模块错误码的英文描述
     */
    public function getCodeDesc()
    {
        return $this->codeDesc;
    }

    /**
     * 设置模块错误码的英文描述
     * @param
     */
    public function setCodeDesc($codeDesc)
    {
        $this->codeDesc = $codeDesc;
    }


}