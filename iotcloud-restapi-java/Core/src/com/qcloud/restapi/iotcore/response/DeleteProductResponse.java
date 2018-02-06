package com.qcloud.restapi.iotcore.response;

public class DeleteProductResponse extends Response {
    /**
     * 解析JSON字串并构造DeleteProductResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public DeleteProductResponse(String response) {
        super(response);
    }
}
