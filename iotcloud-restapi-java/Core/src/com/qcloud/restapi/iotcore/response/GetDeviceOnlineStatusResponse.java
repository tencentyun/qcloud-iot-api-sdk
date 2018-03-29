package com.qcloud.restapi.iotcore.response;

import com.google.gson.JsonArray;

import java.util.ArrayList;
import java.util.List;

public class GetDeviceOnlineStatusResponse extends Response {
    public class DeviceOnlineStatus {
        public String deviceName = "";
        public int online = 0;    //0:表示不在线，1:表示在线，2:表示获取设备在线状态失败
        public int loginTime = 0; //设备登陆时间，形式为UNIX时间戳，仅在设备在线时提供


        public DeviceOnlineStatus() {

        }
    }

    /**
     * 解析JSON字串并构造GetDeviceOnlineStatusResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public GetDeviceOnlineStatusResponse(String response) {
        super(response);
    }



    public List<DeviceOnlineStatus> getDeviceOnlineStatus() {
        List <DeviceOnlineStatus> list = new ArrayList<>();

        try {
            JsonArray arr = jsonObj.getAsJsonArray("devices");
            for (int i = 0; i < arr.size(); i++) {
                DeviceOnlineStatus info = new DeviceOnlineStatus();

                info.deviceName = arr.get(i).getAsJsonObject().get("deviceName").getAsString();
				
                try {
                    info.online = arr.get(i).getAsJsonObject().get("online").getAsInt();
                }catch (Exception e) {
                }

                try {
                    info.loginTime = arr.get(i).getAsJsonObject().get("loginTime").getAsInt();
                }catch (Exception e) {
                }

                list.add(info);
            }
        }catch (Exception e) {
        }

        return list;
    }
}
