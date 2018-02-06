<?php

namespace TXIoTCloud\Services;

use TXIoTCloud\Http\HttpClient;
use TXIoTCloud\Exception\IllegalArgumentException;
use TXIoTCloud\Request\CreateMultiDeviceRequest;
use TXIoTCloud\Request\CreateProductRequest;
use TXIoTCloud\Request\CreateDeviceRequest;
use TXIoTCloud\Request\DeleteDeviceRequest;
use TXIoTCloud\Request\DeleteProductRequest;
use TXIoTCloud\Request\GetCreateMultiDevTaskRequest;
use TXIoTCloud\Request\GetDeviceShadowRequest;
use TXIoTCloud\Request\GetMultiDevicesRequest;
use TXIoTCloud\Request\ListDevicesRequest;
use TXIoTCloud\Request\ListProductsRequest;
use TXIoTCloud\Request\PublishRequest;
use TXIoTCloud\Request\UpdateDeviceShadowRequest;
use TXIoTCloud\Response\CreateProductResponse;
use TXIoTCloud\Response\CreateMultiDeviceResponse;
use TXIoTCloud\Response\CreateDeviceResponse;
use TXIoTCloud\Response\DeleteDeviceResponse;
use TXIoTCloud\Response\DeleteProductResponse;
use TXIoTCloud\Response\GetCreateMultiDevTaskResponse;
use TXIoTCloud\Response\GetDeviceShadowResponse;
use TXIoTCloud\Response\GetMultiDevicesResponse;
use TXIoTCloud\Response\ListProductsResponse;
use TXIoTCloud\Response\PublishResponse;
use TXIoTCloud\Response\UpdateDeviceShadowResponse;


class RequestHandler
{

    /**
     * @var string 区域参数，用来标识希望操作哪个区域的实例
     */
    private static $region = "";

    /**
     * @var string 由腾讯云平台上申请的标识身份的 SecretId
     */
    private static $secretId = "";

    /**
     * @var string 由腾讯云平台上申请的标识身份的 SecretKey
     */
    private static $secretKey = "";

    /**
     * 处理创建产品请求
     * @param CreateProductRequest $createProductRequest
     * @return CreateProductResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleCreateProductRequest(CreateProductRequest $createProductRequest): CreateProductResponse
    {

        $parameterArray = array();
        $parameterArray["Action"] = CREATE_PRODUCT;

        if (null == $createProductRequest) {
            throw new IllegalArgumentException("createProductRequest instance is null!");
        }

        $productName = $createProductRequest->getProductName();
        if (!preg_match(PRODUCT_NAME_PATTERN, $productName)) {
            throw new IllegalArgumentException("productName[" . $productName . "] is invalid!");
        } else {
            $parameterArray["productName"] = $productName;
        }

        $productProperties = array();
        $productDescription = $createProductRequest->getProductDescription();
        if (empty($productDescription)) {
            throw new IllegalArgumentException("productDescription is empty!");
        } else {
            $productProperties["productDescription"] = $productDescription;
        }

        $productRegion = $createProductRequest->getProductRegion();
        if (empty($productRegion)) {
            throw  new IllegalArgumentException("productDescription is empty!");
        } else {
            $productProperties["region"] = $productRegion;
        }

        $parameterArray["productProperties"] = json_encode($productProperties);

        self::parseCommonParameters($createProductRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(CREATE_PRODUCT, GET, $parameters);
    }

    /**
     * 处理删除产品请求
     * @param DeleteProductRequest $deleteProductRequest
     * @return DeleteProductResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleDeleteProductRequest(DeleteProductRequest $deleteProductRequest): DeleteProductResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = DELETE_PRODUCT;

        if (null == $deleteProductRequest) {
            throw new IllegalArgumentException("deleteProductRequest instance is null!");
        }

        $productID = $deleteProductRequest->getProductID();
        if (empty($productID)) {
            throw new IllegalArgumentException("productID is empty!");
        } else {
            $parameterArray["productID"] = $productID;
        }

        self::parseCommonParameters($deleteProductRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(DELETE_PRODUCT, GET, $parameters);
    }

    /**
     * 处理创建设备请求
     * @param CreateDeviceRequest $createDeviceRequest
     * @return CreateDeviceResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleCreateDeviceRequest(CreateDeviceRequest $createDeviceRequest): CreateDeviceResponse
    {
        if (null == $createDeviceRequest) {
            throw new IllegalArgumentException("createDeviceRequest instance is null!");
        }

        return HttpClient::sendRequest(CREATE_DEVICE, GET,
            self::handleDeviceRequest(CREATE_DEVICE, $createDeviceRequest));
    }

    /**
     * 删除物联云设备
     * @param DeleteDeviceRequest $deleteDeviceRequest
     * @return DeleteDeviceResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleDeleteDeviceRequest(DeleteDeviceRequest $deleteDeviceRequest): DeleteDeviceResponse
    {
        if (null == $deleteDeviceRequest) {
            throw new IllegalArgumentException("deleteDeviceRequest instance is null!");
        }

        return HttpClient::sendRequest(DELETE_DEVICE, GET,
            self::handleDeviceRequest(DELETE_DEVICE, $deleteDeviceRequest));
    }


    /**
     * 处理查询虚拟设备信息
     * @param GetDeviceShadowRequest $getDeviceShadowRequest
     * @return GetDeviceShadowResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleGetDeviceShadowRequest(GetDeviceShadowRequest $getDeviceShadowRequest): GetDeviceShadowResponse
    {

        if (null == $getDeviceShadowRequest) {
            throw new IllegalArgumentException("getDeviceShadowRequest instance is null!");
        }

        return HttpClient::sendRequest(GET_DEVICE_SHADOW, GET,
            self::handleDeviceRequest(GET_DEVICE_SHADOW, $getDeviceShadowRequest));
    }

    /**
     * 处理查询物联云设备的设备列表
     * @param $listDevicesRequest
     * @return \IoTCloud\Response\CreateDeviceResponse|\IoTCloud\Response\CreateProductResponse|void
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleListDevicesRequest(ListDevicesRequest $listDevicesRequest)
    {
        $parameterArray = array();
        $parameterArray["Action"] = LIST_DEVICES;

        if (null == $listDevicesRequest) {
            throw new IllegalArgumentException("listDevicesRequest instance is null!");
        }

        $productID = $listDevicesRequest->getProductID();
        if (empty($productID)) {
            throw new IllegalArgumentException("productID is empty!");
        } else {
            $parameterArray["productID"] = $productID;
        }

        $parameters = self::handleListRequest($listDevicesRequest, $parameterArray);
        return HttpClient::sendRequest(LIST_DEVICES, GET, $parameters);
    }

    /**
     * 处理列出产品列表请求
     * @param ListProductsRequest $listProductsRequest
     * @return ListProductsResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleListProductsRequest(ListProductsRequest $listProductsRequest): ListProductsResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = LIST_PRODUCTS;

        if (null == $listProductsRequest) {
            throw new IllegalArgumentException("listProductsRequest instance is null!");
        }

        $parameters = self::handleListRequest($listProductsRequest, $parameterArray);
        return HttpClient::sendRequest(LIST_PRODUCTS, GET, $parameters);
    }

    /**
     * 处理更新虚拟设备信息
     * @param UpdateDeviceShadowRequest $updateDeviceShadowRequest
     * @return UpdateDeviceShadowResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleUpdateDeviceShadowRequest(UpdateDeviceShadowRequest $updateDeviceShadowRequest): UpdateDeviceShadowResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = UPDATE_DEVICE_SHADOW;

        if (null == $updateDeviceShadowRequest) {
            throw  new IllegalArgumentException("updateDeviceShadowRequest instance is null!");
        }

        $productID = $updateDeviceShadowRequest->getProductID();
        if (empty($productID)) {
            throw new IllegalArgumentException("productID is empty!");
        } else {
            $parameterArray["productID"] = $productID;
        }

        $deviceName = $updateDeviceShadowRequest->getDeviceName();
        if (!preg_match(DEVICE_NAME_PATTERN, $deviceName)) {
            throw new IllegalArgumentException("deviceName[" . $deviceName . "] is invalid!");
        } else {
            $parameterArray["deviceName"] = $deviceName;
        }

        $state = $updateDeviceShadowRequest->getState();
        if (empty($state)) {
            throw new IllegalArgumentException("state is invalid!");
        } else {
            $parameterArray["state"] = $state;
        }
        $version = $updateDeviceShadowRequest->getVersion();
        if ($version < 0) {
            throw new IllegalArgumentException("version is invalid!");
        } else {
            $parameterArray["version"] = $version;
        }

        self::parseCommonParameters($updateDeviceShadowRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(UPDATE_DEVICE_SHADOW, GET, $parameters);
    }

    /**
     * 处理批量创建物联云设备
     * @param CreateMultiDeviceRequest $createMultiDeviceRequest
     * @return CreateMultiDeviceResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleCreateMultiDeviceRequest(CreateMultiDeviceRequest $createMultiDeviceRequest): CreateMultiDeviceResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = CREATE_MULTI_DEVICE;

        if (null == $createMultiDeviceRequest) {
            throw new IllegalArgumentException("createMultiDeviceRequest instance is null!");
        }

        $productID = $createMultiDeviceRequest->getProductID();
        if (empty($productID)) {
            throw new IllegalArgumentException("productID is empty!");
        } else {
            $parameterArray["productID"] = $productID;
        }

        $listDeviceName = $createMultiDeviceRequest->getListDeviceName();
        if (empty($listDeviceName)) {
            throw new IllegalArgumentException("listDeviceName is empty!");
        } else {
            $index = 0;
            foreach ($listDeviceName as $deviceName) {
                if (!preg_match(DEVICE_NAME_PATTERN, $deviceName)) {
                    throw new IllegalArgumentException("deviceName[" . $deviceName . "] is invalid!");
                } else {
                    $parameterArray["listDeviceName." . $index++] = $deviceName;
                }
            }
        }

        self::parseCommonParameters($createMultiDeviceRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(CREATE_MULTI_DEVICE, GET, $parameters);
    }

    /**
     * 处理查询批量创建设备任务的执行状态请求
     * @param GetCreateMultiDevTaskRequest $getCreateMultiDevTaskRequest
     * @return GetCreateMultiDevTaskResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleGetCreateMultiDevTaskRequest(GetCreateMultiDevTaskRequest $getCreateMultiDevTaskRequest): GetCreateMultiDevTaskResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = GET_CREATE_MULTI_DEV_TASK;

        if (null == $getCreateMultiDevTaskRequest) {
            throw new IllegalArgumentException("getCreateMultiDevTaskRequest instance is null!");
        }

        $taskID = $getCreateMultiDevTaskRequest->getTaskID();
        if (empty($taskID)) {
            throw new IllegalArgumentException("taskID is empty!");
        } else {
            $parameterArray["taskID"] = $taskID;
        }

        self::parseCommonParameters($getCreateMultiDevTaskRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(GET_CREATE_MULTI_DEV_TASK, GET, $parameters);
    }

    /**
     * 处理查询批量创建设备的执行结果请求
     * @param GetMultiDevicesRequest $getMultiDevicesRequest
     * @return GetMultiDevicesResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handleGetMultiDevicesRequest(GetMultiDevicesRequest $getMultiDevicesRequest): GetMultiDevicesResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = GET_MULTI_DEVICES;

        if (null == $getMultiDevicesRequest) {
            throw new IllegalArgumentException("getMultiDevicesRequest instance is null!");
        }

        $taskID = $getMultiDevicesRequest->getTaskID();
        if (empty($taskID)) {
            throw new IllegalArgumentException("taskID is empty!");
        } else {
            $parameterArray["taskID"] = $taskID;
        }

        $pageNum = $getMultiDevicesRequest->getPageNum();
        if ($pageNum < 0) {
            throw new IllegalArgumentException("pageNum is invalid!");
        } else {
            $parameterArray["pageNum"] = $pageNum;
        }

        $pageSize = $getMultiDevicesRequest->getPageSize();
        if ($pageSize < 0) {
            throw new IllegalArgumentException("pageSize is invalid!");
        } else {
            $parameterArray["pageSize"] = $pageSize;
        }

        self::parseCommonParameters($getMultiDevicesRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(GET_MULTI_DEVICES, GET, $parameters);
    }

    /**
     * 处理向某个主题发消息请求
     * @param PublishRequest $publishRequest
     * @return PublishResponse
     * @throws IllegalArgumentException
     * @throws \TXIoTCloud\Exception\ClientException
     */
    public static function handlePublishRequest(PublishRequest $publishRequest): PublishResponse
    {
        $parameterArray = array();
        $parameterArray["Action"] = PUBLISH;

        if (null == $publishRequest) {
            throw new IllegalArgumentException("publishRequest instance is null!");
        }

        $topic = $publishRequest->getTopic();
        if (empty($topic)) {
            throw new IllegalArgumentException("topic is empty!");
        } else {
            $parameterArray["topic"] = $topic;
        }

        $payload = $publishRequest->getPayload();
        if (empty($payload)) {
            throw new IllegalArgumentException("payload is empty!");
        } else {
            $parameterArray["payload"] = $payload;
        }

        $productID = $publishRequest->getProductID();
        if (empty($productID)) {
            throw new IllegalArgumentException("productID is empty!");
        } else {
            $parameterArray["productID"] = $productID;
        }

        $deviceName = $publishRequest->getDeviceName();
        if (!preg_match(DEVICE_NAME_PATTERN, $deviceName)) {
            throw new IllegalArgumentException("deviceName[" . $deviceName . "] is invalid!");
        } else {
            $parameterArray["deviceName"] = $deviceName;
        }

        self::parseCommonParameters($publishRequest, GET, $parameterArray);
        $parameters = self::encodeParameters($parameterArray);

        return HttpClient::sendRequest(PUBLISH, GET, $parameters);
    }

    /**
     * 设置安全凭证
     * @param $secretId
     * @param $secretKey
     */
    public static function setSecurityCredential($secretId, $secretKey)
    {
        self::$secretId = $secretId;
        self::$secretKey = $secretKey;
    }

    /**
     * 设置区域参数，用来标识希望操作哪个区域的实例
     * @param $region
     */
    public static function setRegion($region)
    {
        self::$region = $region;
    }

    /**
     * 处理设备请求（包含创建设备、删除设备、查询虚拟设备信息）
     * @param $action
     * @param $deviceRequest
     * @return 编码后的参数字符串
     * @throws IllegalArgumentException
     */
    private static function handleDeviceRequest($action, $deviceRequest)
    {
        $parameterArray = array();
        $parameterArray["Action"] = $action;

        $deviceName = $deviceRequest->getDeviceName();
        if (!preg_match(DEVICE_NAME_PATTERN, $deviceName)) {
            throw new IllegalArgumentException("deviceName[" . $deviceName . "] is invalid!");
        } else {
            $parameterArray["deviceName"] = $deviceName;
        }

        $productID = $deviceRequest->getProductID();
        if (empty($productID)) {
            throw new IllegalArgumentException("productID is empty!");
        } else {
            $parameterArray["productID"] = $productID;
        }

        self::parseCommonParameters($deviceRequest, GET, $parameterArray);
        return self::encodeParameters($parameterArray);
    }

    /**
     * 处理list相关请求（包含ListDevices、ListProducts)
     * @param $listRequest
     * @param $parameterArray
     * @return 编码后的参数字符串
     * @throws IllegalArgumentException
     */
    private static function handleListRequest($listRequest, &$parameterArray)
    {
        $pageSize = $listRequest->getPageSize();
        if ($pageSize < 10 || $pageSize > 250) {
            throw new IllegalArgumentException("pageSize is invalid!");
        } else {
            $parameterArray["pageSize"] = $pageSize;
        }

        $pageNum = $listRequest->getPageNum();
        if ($pageNum < 0) {
            throw new IllegalArgumentException("pageNum is invalid!");
        } else {
            $parameterArray["pageNum"] = $pageNum;
        }

        self::parseCommonParameters($listRequest, GET, $parameterArray);
        return self::encodeParameters($parameterArray);
    }

    /**
     * 解析通用参数
     * @param $baseRequest
     * @param $method
     * @param $parameterArray
     * @throws IllegalArgumentException
     */
    private static function parseCommonParameters($baseRequest, $method, &$parameterArray)
    {
        if (empty(self::$region)) {
            throw new IllegalArgumentException("region is empty, call setRegion function first!");
        } else {
            $parameterArray["Region"] = self::$region;
        }

        $timestamp = $baseRequest->getTimestamp();
        if ($timestamp <= 0) {
            throw new IllegalArgumentException("timestamp is invalid!");
        } else {
            $parameterArray["Timestamp"] = $timestamp;
        }

        $nonce = $baseRequest->getNonce();
        if ($nonce <= 0) {
            throw new IllegalArgumentException("nonce is invalid!");
        } else {
            $parameterArray["Nonce"] = $nonce;
        }

        if (empty(self::$secretId)) {
            throw new IllegalArgumentException("secretId is empty, call setSecurityCredential function first!");
        } else {
            $parameterArray["SecretId"] = self::$secretId;
        }

        $signature = self::generateSignature($method, $parameterArray);

        if (empty($signature)) {
            throw new IllegalArgumentException("signature is empty!");
        } else {
            $parameterArray["Signature"] = $signature;
        }
    }

    /**
     * 生成签名串
     * @param $method
     * @param $parameterArray
     * @return 签名串
     */
    private static function generateSignature($method, &$parameterArray)
    {
        ksort($parameterArray);

        $parameters = "";
        foreach ($parameterArray as $k => $v) {
            $parameters .= $k . "=" . $v . "&";
        }
        $parameters = substr($parameters, 0, strlen($parameters) - 1);

        $srcStr = $method . IoTCloudURL . $parameters;

        return base64_encode(hash_hmac('sha1', $srcStr, self::$secretKey, true));
    }

    /**
     * 对参数值进行编码
     * @param $parameterArray
     * @return 编码后的参数字符串
     */
    private static function encodeParameters($parameterArray)
    {
        $parameters = "";
        foreach ($parameterArray as $k => $v) {
            $v = urlencode($v);
            $parameters .= $k . "=" . $v . "&";
        }
        return substr($parameters, 0, strlen($parameters) - 1);
    }


}