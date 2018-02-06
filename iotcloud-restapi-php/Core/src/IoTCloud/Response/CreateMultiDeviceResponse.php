<?php

namespace TXIoTCloud\Response;

require_once "BaseResponse.php";

class CreateMultiDeviceResponse extends BaseResponse
{

    /**
     * 任务ID，腾讯云生成全局唯一的任务 ID
     */
    protected $taskID;

    /**
     * CreateMultiDeviceResponse constructor.
     */
    public function __construct()
    {
    }

    /**
     * 获取任务ID
     */
    public function getTaskID()
    {
        return $this->taskID;
    }

    /**
     * 设置任务ID
     * @param $taskID
     */
    public function setTaskID($taskID)
    {
        $this->taskID = $taskID;
    }


}