<?php


namespace TXIoTCloud\Demo;

include 'TXIoTCloud.phar';

use PHPUnit\Framework\TestCase;

use TXIoTCloud\Request as Request;
use TXIoTCloud\Model as Model;
use TXIoTCloud\Services\TXIoTCloudClient;

define("PROXY_SERVER", "127.0.0.1");
define("PROXY_PORT", "8000");
define("SECRET_ID", "your_secretId");
define("SECRET_KEY", "your_secretKey");
define("REGION", "gz");

class TXIoTCloudClientSample extends TestCase
{
    private $client = null;
    private $timestamp = 0;
    private $nonce = 0;

    public function setUp()
    {
        $this->client = new TXIoTCloudClient();
        $this->client->setProxy(PROXY_SERVER, PROXY_PORT);
        $this->client->setSecurityCredential(SECRET_ID, SECRET_KEY);
        $this->client->setRegion(REGION);
        $this->timestamp = time();
        $this->nonce = random_int(1, PHP_INT_MAX);
    }

    public function tearDown()
    {
    }

    /**
     * 测试创建一个新的物联云产品
     */
    public function testCreateProduct()
    {
        $name = "your_product_name";
        $description = "your_product_description";
        $encryptionType = "1";
        $productRegion = "gz";

        $productProperties = new Model\ProductProperties($description, $encryptionType, $productRegion);

        $createProductRequest = new Request\CreateProductRequest($this->timestamp, $this->nonce, $name, $productProperties);

        $createProductResponse = $this->client->createProduct($createProductRequest);

        var_dump($createProductResponse);

        $this->assertNotEmpty($createProductResponse);
    }

    /**
     * 测试删除一个物联云产品
     */
    public function testDeleteProduct()
    {
        $productID = "your_productId";

        $deleteProductRequest = new Request\DeleteProductRequest($this->timestamp, $this->nonce, $productID);

        $deleteProductResponse = $this->client->deleteProduct($deleteProductRequest);

        var_dump($deleteProductResponse);

        $this->assertNotEmpty($deleteProductResponse);
    }

    /**
     * 测试新建一个物联云设备
     */
    public function testCreateDevice()
    {
        $name = "your_device_name";
        $productID = "your_productId";

        $createDeviceRequest = new Request\CreateDeviceRequest($this->timestamp, $this->nonce, $name, $productID);

        $createDeviceResponse = $this->client->createDevice($createDeviceRequest);

        var_dump($createDeviceResponse);

        $this->assertNotEmpty($createDeviceResponse);
    }

    /**
     * 测试删除物联云设备
     */
    public function testDeleteDevice()
    {
        $name = "your_device_name";
        $productID = "your_productId";

        $deleteDeviceRequest = new Request\DeleteDeviceRequest($this->timestamp, $this->nonce, $name, $productID);

        $deleteDeviceResponse = $this->client->deleteDevice($deleteDeviceRequest);

        var_dump($deleteDeviceResponse);

        $this->assertNotEmpty($deleteDeviceResponse);
    }

    /**
     * 测试查询虚拟设备信息
     */
    public function testGetDeviceShadow()
    {
        $productID = "your_productId";
        $deviceName = "your_device_name";

        $getDeviceShadowRequest = new Request\GetDeviceShadowRequest($this->timestamp, $this->nonce, $productID, $deviceName);

        $getDeviceShadowResponse = $this->client->getDeviceShadow($getDeviceShadowRequest);

        var_dump($getDeviceShadowResponse);

        $this->assertNotEmpty($getDeviceShadowResponse);
    }

    /**
     * 测试更新虚拟设备信息
     */
    public function testUpdateDeviceShadow()
    {
        $productID = "your_productId";
        $deviceName = "your_device_name";

        $colorArray = array();
        $colorArray['color'] = "red";

        $desiredArray = array();
        $desiredArray['desired'] = $colorArray;

        $state = json_encode($desiredArray);

        var_dump($state);

        $version = 1;

        $updateDeviceShadowRequest = new Request\UpdateDeviceShadowRequest($this->timestamp, $this->nonce, $productID, $deviceName, $state, $version);

        $updateDeviceShadowRequest = $this->client->updateDeviceShadow($updateDeviceShadowRequest);

        var_dump($updateDeviceShadowRequest);

        $this->assertNotEmpty($updateDeviceShadowRequest);
    }

    /**
     * 测试查询物联云设备的设备列表
     */
    public function testListDevices()
    {
        $productID = "your_productId";
        $pageSize = 20;
        $pageNum = 1;

        $listDevicesRequest = new Request\ListDevicesRequest($this->timestamp, $this->nonce, $pageSize, $pageNum, $productID);

        $listDevicesResponse = $this->client->listDevices($listDevicesRequest);

        var_dump($listDevicesResponse);

        $this->assertNotEmpty($listDevicesResponse);
    }

    /**
     * 测试查询物联云产品的产品列表
     */
    public function testListProducts()
    {
        $pageSize = 20;
        $pageNum = 1;

        $listProductsRequest = new Request\ListProductsRequest($this->timestamp, $this->nonce, $pageSize, $pageNum);

        $listProductsResponse = $this->client->listProducts($listProductsRequest);

        var_dump($listProductsResponse);

        $this->assertNotEmpty($listProductsResponse);
    }

    /**
     * 测试批量创建物联云设备
     */
    public function testCreateMultiDevice()
    {
        $productID = "your_productId";
        $listDeviceName = array();
        $deviceName = "your_device_name";
        for ($i = 0; $i < 10; ++$i) {
            $listDeviceName[$i] = $deviceName . "_" . $i;
        }

        $createMultiDeviceRequest = new Request\CreateMultiDeviceRequest($this->timestamp, $this->nonce, $productID, $listDeviceName);

        $createMultiDeviceResponse = $this->client->createMultiDevice($createMultiDeviceRequest);

        var_dump($createMultiDeviceResponse);

        $this->assertNotEmpty($createMultiDeviceResponse);
    }

    /**
     * 测试查询批量创建设备任务的执行状态
     */
    public function testGetCreateMultiDevTask()
    {
        $productID = "your_productId";
        $taskID = "your_taskId";

        $getCreateMultiDevTaskRequest = new Request\GetCreateMultiDevTaskRequest($this->timestamp, $this->nonce, $productID, $taskID);

        $getCreateMultiDevTaskResponse = $this->client->getCreateMultiDevTask($getCreateMultiDevTaskRequest);

        var_dump($getCreateMultiDevTaskResponse);

        $this->assertNotEmpty($getCreateMultiDevTaskResponse);
    }

    /**
     * 测试查询批量创建设备的执行结果
     */
    public function testGetMultiDevices()
    {
        $productID = "your_productId";
        $taskID = "your_taskId";
        $pageNum = 1;
        $pageSize = 20;

        $getMultiDeviceRequest = new Request\GetMultiDevicesRequest($this->timestamp, $this->nonce, $productID, $taskID, $pageNum, $pageSize);

        $getMultiDeviceResponse = $this->client->getMultiDevices($getMultiDeviceRequest);

        var_dump($getMultiDeviceResponse);

        $this->assertNotEmpty($getMultiDeviceResponse);
    }

    /**
     * 测试向某个主题发消息
     */
    public function testPublish()
    {
        $productID = "your_productId";
        $deviceName = "your_device_name";
        $topic = $productID . "/" . $deviceName . "/" . "event";
        $payload = "test";

        $publishRequest = new Request\PublishRequest($this->timestamp, $this->nonce, $topic, $payload, $productID, $deviceName);

        $publishResponse = $this->client->publish($publishRequest);

        var_dump($publishResponse);

        $this->assertNotEmpty($publishResponse);
    }
}