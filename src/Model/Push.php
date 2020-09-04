<?php

namespace MobTech\MobPush\Model;

use MobTech\MobPush\Model\Obj;
use MobTech\MobPush\Model\PushNotify;
use MobTech\MobPush\Model\PushTarget;
use MobTech\MobPush\Model\PushForward;

/**
 * An extremely basic class for creating people objects
 */
class Push extends Obj implements \JsonSerializable
{
    const TASK_CRON_ENABLE = 1;
    const BUSINESS_TYPE_AD = 1;
    const IOS_PROD = 1;
    const IOS_DEV = 0;

    /**
     * 推送任务标识，对接用户服务端唯一ID，传入后原样返回（用户服务端自有）
     */
    protected $workno;

    /**
     * 推送任务来源：webapi 、developerPlatform;
     */
    protected $source = "webapi";

    /**
     * 推送内容
     */
    protected $appkey;

    /**
     * 推送目标
     */
    protected $pushTarget;

    /**
     * 推送展示细节
     */
    protected $pushNotify;

    /**
     * link 相关打开配置
     */
    protected $pushForward;

    public function getPushNotify()
    {
        if (!$this->pushNotify instanceof PushNotify) {
            $this->pushNotify = new PushNotify();
        }
        return $this->pushNotify;
    }

    public function getPushTarget()
    {
        if (!$this->pushTarget instanceof PushTarget) {
            $this->pushTarget = new PushTarget();
        }
        return $this->pushTarget;
    }

    public function getPushForward()
    {
        if (!$this->pushForward instanceof PushForward) {
            $this->pushForward = new PushForward();
        }
        return $this->pushForward;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}