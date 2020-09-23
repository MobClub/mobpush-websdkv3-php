<?php

namespace MobTech\MobPush\Model;

class PushMultiItems extends Obj implements \JsonSerializable
{
    protected $itemId;
    protected $workNo;
    protected $alias;
    protected $rids;
    protected $title;

    /**
     * NotEmpty(message = "[items[$]content]不能为空")
     */
    protected $content;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}