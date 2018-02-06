#!/usr/bin/python
# -*- coding: utf-8 -*-

import os,re,sys,time,struct
from src.QcloudApi.qcloudapi import QcloudApi
#from demo import service

module = 'iotcloud'
config = {
    'Region': 'gz',
    'secretId': 'INPUT_YOUR_SECRET_ID_HERE',
    'secretKey': 'INPUT_YOUR_SECRET_KEY_HERE',
    'method': 'post'
}


#ListProducts
def list_products():
    action = 'ListProducts'
    params = {
        'pageNum': 1,
        'pageSize': 10,
    }
    service = QcloudApi(module, config)
    service.generateUrl(action, params)
    print "list_products rsp:"
    print service.call(action, params)
    pass

#CreateProduct
def create_product(productName):
    action = 'CreateProduct'
    productProperties = "{\"productDescription\":\"\",\"region\":\"gz\"}"
    params = {
        'productName': productName,
        'productProperties': productProperties 
    }
    service = QcloudApi(module, config)
    service.generateUrl(action, params)
    print "create_product rsp:"
    print service.call(action, params)
    pass

#CreateDevice
def create_device(productID, deviceName):
    action = 'CreateDevice'
    params = {
        'productID': productID,
        'deviceName': deviceName,
    }
    service = QcloudApi(module, config)
    service.generateUrl(action, params)
    print "create_device rsp:"
    print service.call(action, params)
    pass

#DescribeDevice
def describe_device(productID, deviceName):
    action = 'DescribeDevice'
    params = {
        'productID': productID,
        'deviceName': deviceName,
    }
    service = QcloudApi(module, config)
    service.generateUrl(action, params)
    print "get_device rsp:"
    print service.call(action, params)
    pass

#GetDeviceShadow
def get_device_shadow(productID, deviceName):
    action = 'GetDeviceShadow'
    params = {
        'productID': productID,
        'deviceName': deviceName,
    }
    service = QcloudApi(module, config)
    service.generateUrl(action, params)
    print params
    print "get_device_shadow rsp:"
    print service.call(action, params)
    pass

#UpdateDeviceShadow
def update_device_shadow(productID, deviceName, version, temperature):
    action = 'UpdateDeviceShadow'
    desireString = '{"desired" : {"temperatureDesire": '
    desireString += temperature
    desireString +='}}'
    params = {
        'productID': productID,
        'deviceName': deviceName,
        'state': desireString,
        'version': version
    }
    service = QcloudApi(module, config)
    service.generateUrl(action, params)
    print params
    print "update_device_shadow rsp:"
    print service.call(action, params)
    pass

def print_usage():
    print "usage: "
    print "       python airConditionerCtrl.py list_products"
    print "       python airConditionerCtrl.py create_product ??[productName]"
    print "       python airConditionerCtrl.py create_device ??[productID] ??[deviceName]"
    print "       python airConditionerCtrl.py describe_device ??[productID] ??[deviceName]"
    print "       python airConditionerCtrl.py get_device_shadow ??[productID] ??[deviceName]"
    print "       python airConditionerCtrl.py update_device_shadow ??[productID] ??[deviceName] ??[version] ??[desired temperature]"


if __name__ == '__main__':
    if (len(sys.argv) == 2):
        if (sys.argv[1] == "list_products"):
            list_products()
        else:
            print_usage()
    elif (len(sys.argv) == 3):
        if (sys.argv[1] == "create_product"):
            create_product(sys.argv[2])
        else:
            print_usage()
    elif (len(sys.argv) == 4):
        if (sys.argv[1] == "create_device"):
            create_device(sys.argv[2], sys.argv[3])
        elif (sys.argv[1] == "describe_device"):
            describe_device(sys.argv[2], sys.argv[3])
        elif (sys.argv[1] == "get_device_shadow"):
            get_device_shadow(sys.argv[2], sys.argv[3])
        else:
            print_usage()
    elif (len(sys.argv) == 6):
        if (sys.argv[1] == "update_device_shadow"):
            update_device_shadow(sys.argv[2], sys.argv[3], sys.argv[4], sys.argv[5])
        else:
            print_usage()
    else:
        print_usage()
        sys.exit()
