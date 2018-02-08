package com.qcloud.restapi.demo;

import com.qcloud.restapi.iotcore.api.TXIotCloud;
import com.qcloud.restapi.iotcore.request.*;
import com.qcloud.restapi.iotcore.response.*;

public class Main {

    private static final String SECRET_ID =  "AKIDCCwQghD9cqpcATSP4VheMo1xe5IFnSjl"; //用户从官网获取的SecretID
    private static final String SECRET_KEY = "vc4HF2astfAPO7ankRs68wWqvkJcfSyE";     //用户从官网获取的SecretKey

    public static void main(String[] args) {
        System.getProperties().setProperty("https.proxyHost", "dev-proxy.oa.com");
        System.getProperties().setProperty("https.proxyPort", "8080");

        String stateJson = "{\"desired\": {\"color\": \"red\"}}";

        String taskID = "";
        TXIotCloud iotCloud = new TXIotCloud(SECRET_ID, SECRET_KEY);

        {
            CreateProductResponse response = iotCloud.createProduct(new CreateProductRequest("james_test_product_ddd", "by jamesbond", "2", "gz"));
            System.out.println("response:" + response);
        }

        {
            CreateDeviceResponse response = iotCloud.createDevice(new CreateDeviceRequest("DWBCZHEHPQ", "test_dev"));
            System.out.println("response:" + response);
        }

        {
            GetDeviceShadowResponse response = iotCloud.getDeviceShadow(new GetDeviceShadowRequest("DWBCZHEHPQ", "test_dev"));
            String data = response.getData();
            System.out.println("data:" + data);

            String payload = response.getPayload();
            System.out.println("payload:" + payload);

            String version = response.getPayloadVersion();
            System.out.println("version:" + version);

            System.out.println("response:" + response);
        }

        {
            ListDevicesResponse response = iotCloud.listDevices(new ListDevicesRequest("0DZOVT14JK"));
            response.getDevices();
            System.out.println("response:" + response);
        }

        {
            ListProductsResponse response = iotCloud.listProducts(new ListProductsRequest());
            response.getProducts();
            System.out.println("response:" + response);
        }

        {
            UpdateDeviceShadowResponse response = iotCloud.updateDeviceShadow(new UpdateDeviceShadowRequest("DWBCZHEHPQ", "test_dev", stateJson, 0));
            System.out.println("response:" + response);
        }

        {
            CreateMultiDeviceResponse response = iotCloud.createMultiDevice(new CreateMultiDeviceRequest("DWBCZHEHPQ", new String[]{"devx", "devy", "devz"}));
            taskID = response.getTaskID();

            System.out.println("response:" + response);
            System.out.println("taskID:" + taskID);
        }

        {
            DeleteDeviceResponse response = iotCloud.deleteDevice(new DeleteDeviceRequest("DWBCZHEHPQ", "xxxx"));
            System.out.println("response:" + response);
        }

        {
            DeleteProductResponse response = iotCloud.deleteProduct(new DeleteProductRequest("DWBCZHEHPQ"));
            System.out.println("response:" + response);
        }

        {
            GetCreateMultiDevTaskResponse response = iotCloud.createMultiDevTask(new GetCreateMultiDevTaskRequest("DWBCZHEHPQ", taskID));
            System.out.println("response:" + response);
        }

        {
            GetMultiDevicesResponse response = iotCloud.getMultiDevices(new GetMultiDevicesRequest("DWBCZHEHPQ",taskID));
            response.getProducts();
            System.out.println("response:" + response);
        }

        {
            PublishResponse response = iotCloud.publish(new PublishRequest("0DZOVT14JK", "shock1", "0DZOVT14JK/shock1/data"));
            System.out.println("response:" + response);
        }
    }
}