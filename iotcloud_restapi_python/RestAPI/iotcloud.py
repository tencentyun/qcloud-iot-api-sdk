#!/usr/bin/python
# -*- coding: utf-8 -*-


import os
import re
import sys
import time
import struct
import json

from src.QcloudApi.qcloudapi import QcloudApi

class IoTCloud(object):

    def __init__(self, region, secretId, secretKey):
        self.module = 'iotcloud'

        self.config = {
            'Region': region,
            'secretId': secretId,
            'secretKey': secretKey,
            'method': 'post'
        }

    def set_region(self, region):
        self.config['Region'] = region

    def set_security_credential(self, secretId, secretKey):
        self.config['secretId'] = secretId
        self.config['secretKey'] = secretKey

    # CreateProduct
    # 创建一个新的物联云产品
    #
    # encryptionType: 加密类型，1表示非对称加密，2表示对称加密。如不填写，默认值是1
    def create_product(self, productName, encryptionType=1):
        action = 'CreateProduct'
        productProperties = "{\"productDescription\":\"\",\"region\":\"%s\", \"encryptionType\":\"%s\"}" % (self.config[
            'Region'], encryptionType)
        params = {
            'productName': productName,
            'productProperties': productProperties        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # DeleteProduct
    # 删除一个新的物联云产品
    def delete_product(self, productID):
        action = 'DeleteProduct'
        params = {
            'productID': productID,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # ListProducts
    # 列出产品列表
    def list_products(self, pageNum, pageSize):
        action = 'ListProducts'
        params = {
            'pageNum': pageNum,
            'pageSize': pageSize,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # CreateDevice
    # 新建一个物联云设备
    def create_device(self, productID, deviceName):
        action = 'CreateDevice'
        params = {
            'productID': productID,
            'deviceName': deviceName,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # DeleteDevice
    # 删除一个物联云设备
    def delete_device(self, productID, deviceName):
        action = 'DeleteDevice'
        params = {
            'productID': productID,
            'deviceName': deviceName,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # ListDevices
    # 查询物联云设备的设备列表
    #
    # pageSize 分页大小，当前页面中显示的最大数量，值范围 10-250
    # pageNum 分页页数，当前页面会返回第 pageNum 页的结果
    def list_devices(self, productID, pageNum, pageSize):
        action = 'ListDevices'
        params = {
            'pageNum': pageNum,
            'pageSize': pageSize,
            'productID': productID,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # GetDeviceShadow
    # 查询虚拟设备信息
    def get_device_shadow(self, productID, deviceName):
        action = 'GetDeviceShadow'
        params = {
            'productID': productID,
            'deviceName': deviceName,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # UpdateDeviceShadow
    # 更新虚拟设备信息
    def update_device_shadow(self, productID, deviceName, version, stateString):
        action = 'UpdateDeviceShadow'
        params = {
            'productID': productID,
            'deviceName': deviceName,
            'state': stateString,
            'version': version
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # CreateMultiDevices
    # 创建多个设备（目前只支持一次性最多创建100个）
    def create_multi_devices(self, productID, listDeviceName):
        params = {'listDeviceName.' +
                  str(ix): device_name for ix, device_name in enumerate(listDeviceName)}
        params['productID'] = productID
        action = 'CreateMultiDevice'
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # GetCreateMultiDevTask
    # 用于查询批量创建设备任务的执行状态
    def get_create_multi_devtask(self, productID, taskID):
        action = 'GetCreateMultiDevTask'
        params = {
            'productID': productID,
            'taskID': taskID,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # GetMultiDevices
    # 查询批量创建设备的执行结果
    # 同时创建多个设备为耗时操作，在创建多个设备后, 若要查询新创建的设备
    # 需要先通过get_create_multi_devtask获取 创建多设备任务状态，若 返回创建多设备任务状态 未标志成功，执行该函数会返回失败
    #
    # pageSize  分页的大小，数值范围 10-250
    # pageNum   请求的页数
    def get_multi_devices(self, productID, taskID, pageNum, pageSize):
        action = 'GetMultiDevices'
        params = {
            'productID': productID,
            'taskID': taskID,
            'pageNum': pageNum,
            'pageSize': pageSize,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)

    # Publish
    # 向某个主题发消息
    def publish(self, topic, payload, productID, deviceName):
        action = 'Publish'
        params = {
            'topic': topic,
            'payload': payload,
            'productID': productID,
            'deviceName': deviceName,
        }
        service = QcloudApi(self.module, self.config)
        service.generateUrl(action, params)
        return service.call(action, params)


if __name__ == '__main__':
    region = 'gz'  # 目前只能填写gz
    secretId = 'INPUT_YOUR_SECRET_ID_HERE'
    secretkey = 'INPUT_YOUR_SECRET_KEY_HERE'

    deviceName = 'device0'
    newProductName = 'NEWPRODUCT'

    iotCloud = IoTCloud(region, secretId, secretkey)

    response = iotCloud.create_product(newProductName)
    jsonRespone = json.loads(response.encode('utf-8'))
    productID = jsonRespone['productID'].encode('utf-8')
    print('create_product: ', response)
    print '=============================================================================='

    response = iotCloud.list_products(1, 10)
    print('list_products: ', response)
    print '=============================================================================='

    response = iotCloud.create_device(productID, 'device0')
    print('create_device: ', response)
    print '=============================================================================='

    response = iotCloud.create_multi_devices(productID, ['device1', 'device2', 'device3'])
    jsonRespone = json.loads(response.encode('utf-8'))
    taskID = jsonRespone['taskID'].encode('utf-8')
    print('create_multi_devices: ', response)
    print '=============================================================================='

    response = iotCloud.get_create_multi_devtask(productID, taskID)
    print('get_create_multi_devtask: ', response)
    print '=============================================================================='

    response = iotCloud.get_multi_devices(productID, taskID, 1, 10)
    print('get_multi_devices: ', response)
    print '=============================================================================='

    response = iotCloud.list_devices(productID, 1, 10)
    print('list_devices: ', response)
    print '=============================================================================='

    topic = productID + '/' + deviceName + "/event"
    response = iotCloud.publish(topic, 'hello', productID, deviceName)
    print('publish: ', response)
    print '=============================================================================='
