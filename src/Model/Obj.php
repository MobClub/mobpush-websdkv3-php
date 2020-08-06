<?php

namespace MobTech\MobPush\Model;

abstract class Obj
{
    /**
     * __call魔术方法，如果对象请求的方法不存在或者没有权限访问的时候
     * 调用魔术方法
     */
    public function __call($name, $args)
    {
        // get + 属性名
        $field = preg_match('/^get(\w+)/', $name, $matches);
        if ($field && $matches[1]) {
            $property = lcfirst(ucwords($matches[1]));
            return $this->$property;
        }

        // set + 属性名
        $field = preg_match('/^set(\w+)/', $name, $matches);
        if ($field && $matches[1]) {
            $property = lcfirst(ucwords($matches[1]));
            return $this->$property = $args[0];
        }
    }
}