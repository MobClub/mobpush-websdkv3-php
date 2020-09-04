<?php

namespace MobTech\MobPush\Model;

class PushForward extends Obj implements \JsonSerializable
{
    /**
     * 0 打开首页 1 url跳转 2  scheme 跳转
     */
    protected $nextType = 0;

    /**
     * 跳转
     */
    protected $url;

    /**
     * scheme功能的的uri
     */
    protected $scheme;

    /**
     * moblink功能的参数 a=123&b=345
     */
    protected $schemeDataList = [];

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}