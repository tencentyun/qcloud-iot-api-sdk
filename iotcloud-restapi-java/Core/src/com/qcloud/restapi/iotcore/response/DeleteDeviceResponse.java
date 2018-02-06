package com.qcloud.restapi.iotcore.response;

public class DeleteDeviceResponse extends Response {
    /**
     * 解析JSON字串并构造DeleteDeviceResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public DeleteDeviceResponse(String response) {
        super(response);
    }
}
