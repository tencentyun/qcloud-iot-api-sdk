package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

public class GetCreateMultiDevTaskResponse extends Response {
    /**
     * 解析JSON字串并构造GetCreateMultiDevTaskResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public GetCreateMultiDevTaskResponse(String response) {
        super(response);
    }

    public int getTaskStatus() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("taskStatus").getAsInt();
            }
        }catch (Exception e) {
        }

        return -1;
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
