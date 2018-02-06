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

        TXIotCloud iotCloud = new TXIotCloud(SECRET_ID, SECRET_KEY);
        Response response;

        response = iotCloud.createProduct(new CreateProductRequest("james_test_product_y", "by jamesbond", "gz"));
        System.out.println("response:" + response);

        response = iotCloud.createDevice(new CreateDeviceRequest("DWBCZHEHPQ", "test_dev"));
        System.out.println("response:" + response);

        response = iotCloud.getDeviceShadow(new GetDeviceShadowRequest("DWBCZHEHPQ", "test_dev"));
        System.out.println("response:" + response);

        response = iotCloud.listDevices(new ListDevicesRequest("0DZOVT14JK"));
        System.out.println("response:" + response);

        response = iotCloud.listProducts(new ListProductsRequest());
        System.out.println("response:" + response);

        response = iotCloud.updateDeviceShadow(new UpdateDeviceShadowRequest("DWBCZHEHPQ", "test_dev", stateJson, 1));
        System.out.println("response:" + response);

        response = iotCloud.createMultiDevice(new CreateMultiDeviceRequest("DWBCZHEHPQ", new String[] {"devapple", "devbaba", "deveggs"}));
        System.out.println("response:" + response);

        response = iotCloud.deleteDevice(new DeleteDeviceRequest("DWBCZHEHPQ", "xxxx"));
        System.out.println("response:" + response);

        response = iotCloud.deleteProduct(new DeleteProductRequest("DWBCZHEHPQ"));
        System.out.println("response:" + response);

        response = iotCloud.createMultiDevTask(new GetCreateMultiDevTaskRequest("5a6727173332ea33dc659041"));
        System.out.println("response:" + response);

        response = iotCloud.getMultiDevices(new GetMultiDevicesRequest("5a6727173332ea33dc659041"));
        System.out.println("response:" + response);

        response = iotCloud.publish(new PublishRequest("0DZOVT14JK", "shock1", "0DZOVT14JK/shock1/data", "adadf"));
        System.out.println("response:" + response);
    }
}