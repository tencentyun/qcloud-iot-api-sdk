#!/usr/bin/python
# -*- coding: utf-8 -*-

from base import Base

class IOTCLOUD(Base):
    requestHost = 'iotcloud.api.qcloud.com'

def main():
    action = 'DescribeVpcs'
    config = {
        'Region': 'gz',
        'secretId': '你的secretId',
        'secretKey': '你的secretKey',
        'method': 'get'
    }
    params = {}
    service = IOTCLOUD(config)
    print service.call(action, params)

if (__name__ == '__main__'):
    main()
