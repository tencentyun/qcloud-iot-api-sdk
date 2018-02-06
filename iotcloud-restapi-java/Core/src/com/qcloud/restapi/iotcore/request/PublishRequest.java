package com.qcloud.restapi.iotcore.request;

public class PublishRequest extends Request {

    /**
     * 构造PublishRequest对象
     *
     * @param productID 从官网获得的productID
     * @param deviceName 设备名称
     * @param topic topic标识串
     * @param payload 内容（payload）
     */
    public PublishRequest(String productID, String deviceName, String topic, String payload) {
        put("Action", "Publish");
        put("productID", productID);
        put("deviceName", deviceName);
        put("topic", topic);
        put("payload", payload);
    }
}
