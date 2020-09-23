<?php

namespace MobTech\MobPush\Model;

use MobTech\MobPush\Model\PushMultiItems;

class PushMulti extends Obj implements \JsonSerializable
{
    protected $pushWork;

    protected $items;

    public function getItems()
    {
        if (!$this->items instanceof PushMultiItems) {
            $this->items = new PushMultiItems();
        }
        return $this->items;
    }

    public function setItems($items)
    {
        return $this->items[] = $items;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}