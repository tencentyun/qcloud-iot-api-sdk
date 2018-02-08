package com.qcloud.restapi.iotcore.response;

import com.google.gson.*;

import java.util.ArrayList;
import java.util.List;

public class GetMultiDevicesResponse extends Response {
    public class CreateDeviceInfo {
        public String deviceName = "";
        public String deviceCert = "";
        public String devicePrivateKey = "";
        public String devicePsk = "";
        public int result = -1;

        public CreateDeviceInfo() {

        }
    }

    /**
     * 解析JSON字串并构造GetMultiDevicesResponse对象
     *
     * @param response 从服务端返回的应答JSON字串
     */
    public GetMultiDevicesResponse(String response) {
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

    public List<CreateDeviceInfo> getProducts() {
        List <CreateDeviceInfo> list = new ArrayList<>();

        try {
            JsonArray arr = jsonObj.getAsJsonArray("listCreateDeviceInfo");
            for (int i = 0; i < arr.size(); i++) {
                CreateDeviceInfo info = new CreateDeviceInfo();

                info.deviceName = arr.get(i).getAsJsonObject().get("deviceName").getAsString();
				
                try {
                    info.deviceCert = arr.get(i).getAsJsonObject().get("deviceCert").getAsString();
                }catch (Exception e) {
                }

                try {
                    info.devicePrivateKey = arr.get(i).getAsJsonObject().get("devicePrivateKey").getAsString();
                }catch (Exception e) {
                }

                try {
                    info.devicePsk = arr.get(i).getAsJsonObject().get("devicePsk").getAsString();
                }catch (Exception e) {
                }

                info.result = arr.get(i).getAsJsonObject().get("result").getAsInt();

                list.add(info);
            }
        }catch (Exception e) {
        }

        return list;
    }
}
