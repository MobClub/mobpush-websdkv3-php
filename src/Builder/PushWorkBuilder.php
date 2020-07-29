<?php
/**
 * Created by PhpStorm.
 * User: mober
 * Date: 23/7/20
 * Time: 下午2:25
 */

namespace MobTech\MobPush\Builder;

use MobTech\MobPush\Model\Push;

class PushWorkBuilder
{
    const TARGET_ALL = 1;
    const TARGET_ALIAS = 2;
    const TARGET_TAGS = 3;
    const TARGET_RIDS = 4;
    const TARGET_AREAS = 9;

    private $push;

    public function __construct()
    {
        $this->push = new Push();
    }

    public function builder()
    {
        return $this->push;
    }

    /* 必填参数填充 */
    public function fillParams($workNo, $title, $content)
    {
        if (!$this->push->getPushTarget()) {
            $this->push->setPushTarget();
        }
        $this->push->setWorkNo($workNo);
        $this->push->getPushNotify()->setTitle($title);
        $this->push->getPushNotify()->setContent($content);

    }

    /* 设定推送 */
    public function setTargetAll($workNo, $title, $content)
    {
        $this->fillParams($workNo, $title, $content);
        $this->push->getPushTarget()->setTarget(self::TARGET_ALL);
        return $this;
    }

    /* 设置别名 */
    public function setTargetByAlias($workNo, $title, $content, $alias)
    {
        $this->fillParams($workNo, $title, $content);
        $this->push->getPushTarget()->setAlias($alias);
        $this->push->getPushTarget()->setTarget(self::TARGET_ALIAS);
        return $this;
    }

    /* 设置标签,可以传入多个 */
    public function setTargetTags($workNo, $title, $content, $tags)
    {
        $this->fillParams($workNo, $title, $content);
        $this->push->getPushTarget()->setTags($tags);
        $this->push->getPushTarget()->setTarget(self::TARGET_TAGS);
        return $this;
    }

    /* 设置Registration Id,可以传入多个 */
    public function setTargetRids($workNo, $title, $content, $rids)
    {
        $this->fillParams($workNo, $title, $content);
        $this->push->getPushTarget()->setRids($rids);
        $this->push->getPushTarget()->setTarget(self::TARGET_RIDS);
        return $this;
    }

    /* 设置地理位置 */
    public function setTargetByAreas($workNo, $title, $content, $pushAreas)
    {
        $this->fillParams($workNo, $title, $content);
        if (isset($pushAreas[0])) {
            $this->push->getPushTarget()->setCountry($pushAreas[0]);
        }
        if (isset($pushAreas[1])) {
            $this->push->getPushTarget()->setProvince($pushAreas[1]);
        }
        if (isset($pushAreas[2])) {
            $this->push->getPushTarget()->setCity($pushAreas[2]);
        }
        $this->push->getPushTarget()->setTarget(self::TARGET_RIDS);
        return $this;
    }

    /* 自定义内容 */
    public function setNotifyExtraParams($key, $value)
    {
        $pushMap['key'] = $key;
        $pushMap['value'] = $value;
        array_push($this->push->getPushNotify()->getExtrasMapList(), $pushMap);
        return $this;
    }

    public function setNotifyExtraMap($extraMap)
    {
        $this->push->getPushNotify()->setExtrasMapList($extraMap);
        return $this;
    }

    public function setForwardExtraParams($key, $value)
    {
        $pushMap['key'] = $key;
        $pushMap['value'] = $value;
        array_push($this->push->getPushNotify()->getSchemeDataList(), $pushMap);
        return $this;
    }

    public function setForwardExtraMap($extraMap)
    {
        $this->push->getPushNotify()->setSchemeDataList($extraMap);
        return $this;
    }
}