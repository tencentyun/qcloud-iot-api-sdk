<?php

namespace TXIoTCloud\Response;

require_once "CreateMultiDeviceResponse.php";

class GetCreateMultiDevTaskResponse extends CreateMultiDeviceResponse
{

    /**
     * 任务是否完成。0 代表任务未开始，1 代表任务正在执行，2 代表任务已完成
     */
    private $taskStatus;

    /**
     * CreateMultiDeviceResponse constructor.
     */
    public function __construct()
    {
    }

    /**
     * 获取任务是否完成。0 代表任务未开始，1 代表任务正在执行，2 代表任务已完成
     */
    public function getTaskStatus()
    {
        return $this->taskStatus;
    }

    /**
     * 设置任务是否完成。0 代表任务未开始，1 代表任务正在执行，2 代表任务已完成
     * @param $taskStatus
     */
    public function setTaskStatus($taskStatus)
    {
        $this->taskStatus = $taskStatus;
    }

}