package com.qcloud.restapi.iotcore.response;

public class PublishResponse extends Response {
    /**
     * 解析JSON字串并构造PublishResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public PublishResponse(String response) {
        super(response);
    }
}
