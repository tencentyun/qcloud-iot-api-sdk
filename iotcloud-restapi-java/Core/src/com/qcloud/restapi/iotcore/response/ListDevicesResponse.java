package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

import java.util.ArrayList;
import java.util.List;

public class ListDevicesResponse extends Response {
    public class DeviceInfo {
        public String deviceName= "";

        public DeviceInfo() {

        }
    }

    /**
     * 解析JSON字串并构造ListDevicesResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public ListDevicesResponse(String response) {
        super(response);
    }

    public List <DeviceInfo> getDevices() {
        List <DeviceInfo> list = new ArrayList<>();

        try {
            JsonArray arr = jsonObj.getAsJsonArray("devices");
            for (int i = 0; i < arr.size(); i++) {
                DeviceInfo info = new DeviceInfo();

                info.deviceName = arr.get(i).getAsJsonObject().get("deviceName").getAsString();

                list.add(info);
            }
        }catch (Exception e) {
        }

        return list;
    }
}
