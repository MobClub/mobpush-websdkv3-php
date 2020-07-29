<?php

namespace MobTech\MobPush\Config;

class MobPushConfig
{
    /**
     * @var $appkey
     * 需要先设置此数据，怎样获取appKey请至http://www.mob.com官网
     */
    public static $appkey;

    /**
     * @var $appSecret:
     * appKey对应密钥,需要先设置此数据
     */
    public static $appSecret;

    /**
     * baseUrl: webapi http 接口基础url
     */
    const baseUrl = "http://api.push.mob.com/";
}