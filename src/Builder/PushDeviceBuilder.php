<?php
/**
 * Created by PhpStorm.
 * User: mober
 * Date: 23/9/21
 * Time: 下午2:25
 */

namespace MobTech\MobPush\Builder;

use MobTech\MobPush\Config\MobPushConfig;
use MobTech\MobPush\Model\PushDevice;

class PushDeviceBuilder
{
    private $pushDevice;

    public function __construct()
    {
        $this->pushDevice = new PushDevice();
    }

    public function alias($alias)
    {
        $this->pushDevice->setAlias($alias);
        return $this;
    }

    public function tags($tags)
    {
        $this->pushDevice->setTags($tags);
        return $this;
    }

    public function appkey()
    {
        $this->pushDevice->setAppkey(MobPushConfig::$appkey);
        return $this;
    }

    public function registrationId($registrationId)
    {
        $this->pushDevice->setRegistrationId($registrationId);
        return $this;
    }

    public function opType($opType)
    {
        $this->pushDevice->setOpType($opType);
        return $this;
    }

    public function builder()
    {
        return $this->pushDevice;
    }
}
