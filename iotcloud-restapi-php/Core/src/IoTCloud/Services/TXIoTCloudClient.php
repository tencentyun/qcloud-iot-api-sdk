<?php

namespace TXIoTCloud\Services;

use TXIoTCloud\Http\HttpClient;
use TXIoTCloud\Request\CreateDeviceRequest;
use TXIoTCloud\Request\CreateMultiDeviceRequest;
use TXIoTCloud\Request\CreateProductRequest;
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
use TXIoTCloud\Response\ListDevicesResponse;
use TXIoTCloud\Response\ListProductsResponse;
use TXIoTCloud\Response\PublishResponse;
use TXIoTCloud\Response\UpdateDeviceShadowResponse;

require_once "RequestHandler.php";

define("IoTCloudURL", "iotcloud.api.qcloud.com/v2/index.php?");

define("CREATE_PRODUCT", "CreateProduct");
define("DELETE_PRODUCT", "DeleteProduct");
define("CREATE_DEVICE", "CreateDevice");
define("DELETE_DEVICE", "DeleteDevice");
define("GET_DEVICE_SHADOW", "GetDeviceShadow");
define("UPDATE_DEVICE_SHADOW", "UpdateDeviceShadow");
define("LIST_DEVICES", "ListDevices");
define("LIST_PRODUCTS", "ListProducts");
define("CREATE_MULTI_DEVICE", "CreateMultiDevice");
define("GET_CREATE_MULTI_DEV_TASK", "GetCreateMultiDevTask");
define("GET_MULTI_DEVICES", "GetMultiDevices");
define("PUBLISH", "Publish");

define("POST", "POST");
define("GET", "GET");

define("PRODUCT_NAME_PATTERN", "/^[a-zA-Z0-9:_\\-]{1,32}/");
define("DEVICE_NAME_PATTERN", "/^[a-zA-Z0-9:_\\-]{1,48}/");


class TXIoTCloudClient
{

    /**
     * 设置代理
     * @param $proxyServer 代理服务器
     * @param $proxyPort   代理端口
     */
    public function setProxy($proxyServer, $proxyPort)
    {
        HttpClient::setProxy($proxyServer, $proxyPort);
    }

    /**
     * 设置安全凭证
     * @param $secretId   用于标识API调用者身份
     * @param $secretKey  用于加密签名字符串和服务器端验证签名字符串的密钥
     */
    public function setSecurityCredential($secretId, $secretKey)
    {
        RequestHandler::setSecurityCredential($secretId, $secretKey);
    }

    /**
     * 设置区域参数，用来标识希望操作哪个区域的实例，可选：
     * bj:北京
     * gz:广州
     * sh:上海
     * hk:香港
     * ca:北美
     * sg:新加坡
     * usw:美西
     * cd:成都
     * de:德国
     * kr:韩国
     * shjr:上海金融
     * szjr:深圳金融
     * gzopen:广州OPEN
     *
     * @param $region
     */
    public function setRegion($region)
    {
        RequestHandler::setRegion($region);
    }

    /**
     * 创建产品
     * @param CreateProductRequest $createProductRequest
     * @return CreateProductResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function createProduct(CreateProductRequest $createProductRequest)
    {
        return RequestHandler::handleCreateProductRequest($createProductRequest);
    }

    /**
     * 删除一个物联云产品
     * @param DeleteProductRequest $deleteProductRequest
     * @return DeleteProductResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function deleteProduct(DeleteProductRequest $deleteProductRequest)
    {
        return RequestHandler::handleDeleteProductRequest($deleteProductRequest);
    }

    /**
     * 查询物联云产品的产品列表
     * @param ListProductsRequest $listProductsRequest
     * @return ListProductsResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function listProducts(ListProductsRequest $listProductsRequest)
    {
        return RequestHandler::handleListProductsRequest($listProductsRequest);
    }

    /**
     * 创建设备
     * @param CreateDeviceRequest $createDeviceRequest
     * @return CreateDeviceResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function createDevice(CreateDeviceRequest $createDeviceRequest)
    {
        return RequestHandler::handleCreateDeviceRequest($createDeviceRequest);
    }

    /**
     * 删除物联云设备
     * @param DeleteDeviceRequest $deleteDeviceRequest
     * @return DeleteDeviceResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function deleteDevice(DeleteDeviceRequest $deleteDeviceRequest)
    {
        return RequestHandler::handleDeleteDeviceRequest($deleteDeviceRequest);
    }

    /**
     * 查询虚拟设备信息
     * @param GetDeviceShadowRequest $getDeviceShadowRequest
     * @return GetDeviceShadowResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function getDeviceShadow(GetDeviceShadowRequest $getDeviceShadowRequest)
    {
        return RequestHandler::handleGetDeviceShadowRequest($getDeviceShadowRequest);
    }

    /**
     * 更新虚拟设备信息
     * @param UpdateDeviceShadowRequest $updateDeviceShadowRequest
     * @return UpdateDeviceShadowResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function updateDeviceShadow(UpdateDeviceShadowRequest $updateDeviceShadowRequest)
    {
        return RequestHandler::handleUpdateDeviceShadowRequest($updateDeviceShadowRequest);
    }

    /**
     * 查询物联云设备的设备列表
     * @param ListDevicesRequest $listDevicesRequest
     * @return ListDevicesResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function listDevices(ListDevicesRequest $listDevicesRequest)
    {
        return RequestHandler::handleListDevicesRequest($listDevicesRequest);
    }

    /**
     * 批量创建物联云设备
     * @param CreateMultiDeviceRequest $createMultiDeviceRequest
     * @return CreateMultiDeviceResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function createMultiDevice(CreateMultiDeviceRequest $createMultiDeviceRequest)
    {
        return RequestHandler::handleCreateMultiDeviceRequest($createMultiDeviceRequest);
    }

    /**
     * 查询批量创建设备任务的执行状态
     * @param GetCreateMultiDevTaskRequest $getCreateMultiDevTaskRequest
     * @return GetCreateMultiDevTaskResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function getCreateMultiDevTask(GetCreateMultiDevTaskRequest $getCreateMultiDevTaskRequest)
    {
        return RequestHandler::handleGetCreateMultiDevTaskRequest($getCreateMultiDevTaskRequest);
    }

    /**
     * 查询批量创建设备的执行结果
     * @param GetMultiDevicesRequest $getMultiDevicesRequest
     * @return GetMultiDevicesResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function getMultiDevices(GetMultiDevicesRequest $getMultiDevicesRequest)
    {
        return RequestHandler::handleGetMultiDevicesRequest($getMultiDevicesRequest);
    }

    /**
     * 向某个主题发消息请求
     * @param PublishRequest $publishRequest
     * @return PublishResponse
     * @throws \TXIoTCloud\Exception\ClientException
     * @throws \TXIoTCloud\Exception\IllegalArgumentException
     */
    public function publish(PublishRequest $publishRequest)
    {
        return RequestHandler::handlePublishRequest($publishRequest);
    }

}
