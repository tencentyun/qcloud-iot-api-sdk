package com.qcloud.restapi.iotcore.response;
import com.google.gson.*;

public class UpdateDeviceShadowResponse extends Response {
    /**
     * 解析JSON字串并构造UpdateDeviceShadowResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public UpdateDeviceShadowResponse(String response) {
        super(response);
    }

    public String getData() {
        try {
            if (jsonObj != null) {
                return jsonObj.getAsJsonObject("data").toString();
            }
        }catch (Exception e) {
        }

        return "";
    }

    public String getPayload() {
        try {
            if (jsonObj != null) {
                return jsonObj.getAsJsonObject("data").getAsJsonObject("payload").toString();
            }
        }catch (Exception e) {
        }

        return "";
    }

    public String getPayloadVersion() {
        try {
            if (jsonObj != null) {
                return jsonObj.getAsJsonObject("data").getAsJsonObject("payload").get("version").getAsString();
            }
        }catch (Exception e) {
        }

        return "";
    }
}
