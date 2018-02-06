package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

public class CreateDeviceResponse extends Response {

    /**
     * 解析JSON字串并构造CreateDeviceResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public CreateDeviceResponse(String response) {
        super(response);
    }

    public String getDeviceName() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("deviceName").getAsString();
            }
        }catch (Exception e) {
        }
        return "";
    }

    public String getDeviceCert() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("deviceCert").getAsString();
            }
        }catch (Exception e) {
        }

        return "";
    }

    public String getDevicePrivateKey() {
        try {
            if (jsonObj != null) {
                return jsonObj.get("devicePrivateKey").getAsString();
            }
        }catch (Exception e) {
        }

        return "";
    }
}
