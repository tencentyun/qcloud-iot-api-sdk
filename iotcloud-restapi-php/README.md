#  PHP-SDK 使用

## PHP-SDK 使用说明
### 公共参数

|  名称       |    类型    |               描述                          | 必选 |
| ---------- | --------- | --------------------------------------------|-----|
|  Region    | String   | 区域参数，用来标识希望操作哪个区域的实例            |  是  |
|  Timestamp | UInt     | 当前UNIX时间戳                                 |  是  |
|  Nonce     | UInt     | 随机正整数，与 Timestamp 联合起来, 用于防止重放攻击 |  是  |
|  SecretId  | String   | 由腾讯云平台上申请的标识身份的 SecretId            |  是 |
|  SecretKey | String   | 由腾讯云平台上申请的标识身份的 SecretKey           |  是 |

为简便接口使用，参数 Region、SecretId 和 SecretKey 三个公共参数通过以下接口单独设置：

- 参数 Region 通过类 TXIoTCloudClient 中 setRegion() 接口进行设置；
- 参数 SecretId、SecretKey 通过类 TXIoTCloudClient 中 setSecurityCredential() 接口进行设置。

### 获取云 API 密钥(SecretId、SecretKey)
- 登入 [控制台](https://console.cloud.tencent.com/iotcloud) 后，进入 [云API密钥](https://console.cloud.tencent.com/cam/capi)

![云API密钥](https://mc.qcloudimg.com/static/img/62352850496e6184f6a74f496f8d8638/miyao1.png)

- 在 **API 密钥管理**中 点击 **新建密钥**，新建成功后获取到 **SecretId** 和 **SecretKey**

![新建密钥](https://mc.qcloudimg.com/static/img/81d74a87132a2b8e92989bd4abd32278/miyao2.png)

### PHP-SDK 引入及初始化 
- 下载 [PHP-SDK](https://mc.qcloudimg.com/static/archive/efa554822424bdb785491f5d144acc28/TXIoTCloud-restapi-php-sdk.zip) 开发包，解压后得到 **TXIoTCloud.phar**
- 在 PHP 文件中引入开发包 **TXIoTCloud.phar**，如：
```
<?php
include 'TXIoTCloud.phar';
use TXIoTCloud\Services\TXIoTCloudClient;
...
```
- 初始化 Region、SecretId、SecretKey 等公共参数信息
```
<?php
include 'TXIoTCloud.phar';
use TXIoTCloud\Services\TXIoTCloudClient;

// secretId、secretKey 为在腾讯云平台上创建的云 API 密钥 
$secretId = "your_secretId";
$secretKey = "your_secretKey";

// 区域参数，用来标识希望操作哪个区域的实例，如广州(gz)
$region = "gz";

$client = new TXIoTCloudClient();
$client->setSecurityCredential($secretId, $secretKey);
$client->setRegion($region);
...
```
- 若需通过代理发起请求，调用类 TXIoTCloudClient 中的 setProxy() 接口进行设置
```
<?php
include 'TXIoTCloud.phar';
use TXIoTCloud\Services\TXIoTCloudClient;

// 代理服务器域名或IP
$proxyServer = "127.0.0.1";

// 代理服务器端口
$proxyPort = "8000";

$client->setProxy($proxyServer, $proxyPort);
...
```

### 接口调用
- 以创建产品( createProduct() )为例 ：
```
<?php
include 'TXIoTCloud.phar';
use TXIoTCloud\Request as IoT;
use TXIoTCloud\Services\TXIoTCloudClient;

$timestamp = time();
$nonce = random_int(1, PHP_INT_MAX);
$productName = "test_product";
$productDescription = "测试产品";
$productRegion = "gz";

$createProductRequest = new IoT\CreateProductRequest($timestamp, $nonce, $productName, $productDescription, $productRegion);
$createProductResponse = $client->createProduct($createProductRequest);
...
```

###  腾讯物联云客户端接口 - TXIoTCloudClient

| 序号  |         方法名           | 说明                       |
| ---- | ----------------------- | -------------------------  |
| 1    | setProxy                | 设置代理                    |
| 2    | setSecurityCredential   | 设置安全凭证                 |
| 3    | setRegion               | 设置区域参数                 |
| 4    | createProduct           | 创建产品                    |
| 5    | deleteProduct           | 删除产品                    |
| 6    | listProducts            | 查询产品列表                 |
| 7    | createDevice            | 创建设备                    |
| 8    | deleteDevice            | 删除设备                    |
| 9    | getDeviceShadow         | 获取虚拟设备信息              |
| 10   | updateDeviceShadow      | 更新虚拟设备信息              |
| 11   | listDevices             | 查询设备列表                 |
| 12   | createMultiDevice       | 批量创建设备                 |
| 13   | getCreateMultiDevTask   | 查询批量创建设备任务的执行状态  |
| 14   | getMultiDevices         | 查询批量创建设备的执行结果     |
| 15   | publish                 | 向某个主题发布消息            |

### SDK 目录和文件组成

```
+-- README.md                                 : 快速开始导引

+-- Core                                      : SDK 源码
      +-- src                                       
           +-- IoTCloud
                   +-- Exception              : 客户端、参数异常
                   +-- Http                   : Http 通信相关
                   +-- Model                  : 封装通用 Model 信息
                   +-- Request                : 封装请求信息
                   +-- Response               : 封装响应信息
                   +-- Services               : 封装请求、响应处理类及客户端接口   
                         +-- TXIoTCloudClient : 物联云客户端，封装所有对外接口             
+-- Demo                                      : Demo 单元测试
      +-- TXIoTCloud.phar                     : 开发包
      +-- TXIoTCloudClientSample              : 物联云客户端单元测试示例   
+-- Build.php                                 : 开发包编译脚本                          
```