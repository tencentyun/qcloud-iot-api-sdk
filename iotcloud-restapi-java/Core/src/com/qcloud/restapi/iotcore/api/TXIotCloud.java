package com.qcloud.restapi.iotcore.api;

import com.qcloud.restapi.iotcore.request.*;
import com.qcloud.restapi.iotcore.response.*;
import com.qcloud.restapi.iotcore.utils.HttpClient;
import com.qcloud.restapi.iotcore.utils.IotCloudUtils;


public class TXIotCloud {
    private String mSecretId;       //用户从官网获得的secretId
    private String mSecretKey;      //用户从官网获得的secretKey
    private String mRegion = "gz";  //当前仅支持广州区域

    private int mConnectTimeout = HttpClient.DEFAULT_CONNECT_TIMEOUT;
    private int mReadTimeout = HttpClient.DEFAULT_READ_TIMEOUT;

    /**
     * 构造TXIotCloud对象
     *
     * @param secretId 用户从官网获得的secretId
     * @param secretKey 用户从官网获得的secretKey
     */
    public TXIotCloud(String secretId, String secretKey) {
        this.mSecretId = secretId;
        this.mSecretKey = secretKey;
    }

    /**
     * 构造TXIotCloud对象
     *
     * @param secretId 用户从官网获得的secretId
     * @param secretKey 用户从官网获得的secretKey
     * @param region 区域标识，详见官网。当前仅支持广州区域（gz）
     */
    public TXIotCloud(String secretId, String secretKey, String region) {
        this.mSecretId = secretId;
        this.mSecretKey = secretKey;
        this.mRegion = region;
    }

    /**
     * 设置HTTP连接超时时间
     *
     * @param connectTimeout HTTP连接超时时间。单位：毫秒。
     */
    public void setConnectTimeout(int connectTimeout) {
        this.mConnectTimeout = connectTimeout;
    }

    /**
     * 设置HTTP读超时时间
     *
     * @param readTimeout HTTP读超时时间。单位：毫秒。
     */
    public void setReadTimeout(int readTimeout) {
        this.mReadTimeout = readTimeout;
    }

    /**
     * 创建产品
     *
     * @param request 请求
     * @return 应答
     */
    public CreateProductResponse createProduct(CreateProductRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new CreateProductResponse(response);
    }

    /**
     * 创建设备
     *
     * @param request 请求
     * @return 应答
     */
    public CreateDeviceResponse createDevice(CreateDeviceRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new CreateDeviceResponse(response);
    }

    /**
     * 获取设备影子信息
     *
     * @param request 请求
     * @return 应答
     */
    public GetDeviceShadowResponse getDeviceShadow(GetDeviceShadowRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new GetDeviceShadowResponse(response);
    }

    /**
     * 查询设备列表
     *
     * @param request 请求
     * @return 应答
     */
    public ListDevicesResponse listDevices(ListDevicesRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new ListDevicesResponse(response);
    }

    /**
     * 查询产品列表
     *
     * @param request 请求
     * @return 应答
     */
    public ListProductsResponse listProducts(ListProductsRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new ListProductsResponse(response);
    }

    /**
     * 更新设备影子信息
     *
     * @param request 请求
     * @return 应答
     */
    public UpdateDeviceShadowResponse updateDeviceShadow(UpdateDeviceShadowRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new UpdateDeviceShadowResponse(response);
    }

    /**
     * 批量创建设备
     *
     * @param request 请求
     * @return 应答
     */
    public CreateMultiDeviceResponse createMultiDevice(CreateMultiDeviceRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new CreateMultiDeviceResponse(response);
    }

    /**
     * 删除设备
     *
     * @param request 请求
     * @return 应答
     */
    public DeleteDeviceResponse deleteDevice(DeleteDeviceRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new DeleteDeviceResponse(response);
    }

    /**
     * 删除产品
     *
     * @param request 请求
     * @return 应答
     */
    public DeleteProductResponse deleteProduct(DeleteProductRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new DeleteProductResponse(response);
    }

    /**
     * 查询批量创建设备任务的执行状态
     *
     * @param request 请求
     * @return 应答
     */
    public GetCreateMultiDevTaskResponse createMultiDevTask(GetCreateMultiDevTaskRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new GetCreateMultiDevTaskResponse(response);
    }

    /**
     * 查询批量创建设备的执行结果
     *
     * @param request 请求
     * @return 应答
     */
    public GetMultiDevicesResponse getMultiDevices(GetMultiDevicesRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new GetMultiDevicesResponse(response);
    }

    /**
     * 向指定的 TOPIC 发布消息
     *
     * @param request 请求
     * @return 应答
     */
    public PublishResponse publish(PublishRequest request) {
        String requestURL = IotCloudUtils.buildRequestURL(request, mSecretId, mSecretKey, mRegion);

        String response = HttpClient.httpsRequest(requestURL, HttpClient.METHOD_GET, null, mConnectTimeout, mReadTimeout);

        return new PublishResponse(response);
    }
}