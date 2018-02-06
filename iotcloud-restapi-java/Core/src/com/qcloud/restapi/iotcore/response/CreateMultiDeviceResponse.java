package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

public class CreateMultiDeviceResponse extends Response {
    /**
     * 解析JSON字串并构造CreateMultiDeviceResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public CreateMultiDeviceResponse(String response) {
        super(response);
    }

    public String getTaskID() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("taskID").getAsString();
            }
        }catch (Exception e) {
        }

        return "";
    }
}
