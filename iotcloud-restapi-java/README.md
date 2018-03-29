# 腾讯物联云 REST API
腾讯物联云 REST API 为客户提供易于使用的 API（通过封装HTTP接口）。客户应用程序（如：后台软件和APP软件）可使用此 API 实现产品创建/删除、设备创建/删除、发布消息、影子数据操作等相关的功能。



## 1. 目录说明


```
├── .idea                          //IDEA 工程内部文件
├── Core                           //REST API 核心实现
│   ├── src                        //实现源文件
│   └── libs                       //第三方依赖库
├── Demo                           //REST API 使用示例
└── IOT_CLOUD_RESTAPI_JAVA.iml     //IDEA 工程描述文件
```


## 2. 如何使用

### 2.1 获取云 API 密钥(SecretId、SecretKey)
登入 [控制台](https://console.cloud.tencent.com/iotcloud) 后，进入 [云API密钥](https://console.cloud.tencent.com/cam/capi)

![云API密钥](http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/doc/d7cbde91-5723-47f9-8c56-d0381bb3eb1b.png)

在 **API 密钥管理**中 点击 **新建密钥**，新建成功后获取到 **SecretId** 和 **SecretKey**

![新建密钥](http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/doc/ba3f3f9d-db13-45c4-bad6-e5c236ebcbba.png)


### 2.2 编译运行

修改```Demo/src/com/tencent/iotcloud/rest/demo/Main.java```

```
private static final String SECRET_ID =  "XXX"; //用户从官网获取的SecretID
private static final String SECRET_KEY = "XXX"; //用户从官网获取的SecretKey
```
 


用 IntelliJ IDEA 打开工程。然后 Build & Run



## 3. 接口说明
####  TXIoTCloud 接口及功能 （详见TXIotCloud.java代码注释）



| 序号  |         方法名         | 说明                          |
| ---- | --------------------- | ------------------------------|
| 1    | setConnectTimeout     | 设置HTTP连接超时时间             |
| 2    | setReadTimeout        | 设置HTTP读超时时间              |
| 3    | createProduct         | 创建产品                       |
| 4    | createDevice          | 创建设备                       |
| 5    | getDeviceShadow       | 获取设备影子信息                |
| 6    | listDevices           | 查询设备列表                    |
| 7    | listProducts          | 查询产品列表                    |
| 8    | updateDeviceShadow    | 更新设备影子信息                 |
| 9    | createMultiDevice     | 批量创建设备                    |
| 10   | deleteDevice          | 删除设备                        |
| 11   | deleteProduct         | 删除产品                        |
| 12   | getCreateMultiDevTask | 查询批量创建设备任务的执行状态      |
| 13   | getMultiDevices       | 查询批量创建设备的执行结果        |
| 14   | publish               | 向指定的 TOPIC 发布消息          |
| 15   | getDeviceOnlineStatus | 批量查询设备在线状态             |
