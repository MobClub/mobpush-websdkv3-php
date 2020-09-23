<?php

namespace MobTech\MobPush\Model;

class PushDevice extends Obj implements \JsonSerializable
{
    protected $appkey;
    /**
     * 设备注册ID
     */
    protected $registrationId;

    /**
     * 别名
     */
    protected $alias;

    /**
     * 标签
     */
    protected $tags;

    /**
     * 操作类型：1新增标签；2删除标签；3清除所有; 4替换
     */
    protected $opType;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}