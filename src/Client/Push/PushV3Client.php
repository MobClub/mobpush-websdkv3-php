<?php

namespace MobTech\MobPush\Client\Push;

use MobTech\MobPush\Config\MobPushConfig;
use MobTech\MobPush\Builder\PushWorkBuilder;
use MobTech\MobPush\Util\Curl;

class PushV3Client
{
    const PUSH_URI = '/v3/push/createPush';
    const GET_BY_WORK_ID_URI = '/v3/push/getByWorkId';
    const GET_BY_WORK_NO_URI = '/v3/push/getByWorkno';
    const CANCEL_TASK_URI = '/push/drop';
    const REPLACE_TASK_URI = '/push/replace';
    const RECALL_TASK_URI = '/push/recall';

    /* 接口推送 */
    public static function pushTaskV3($push)
    {
        $push->setAppkey(MobPushConfig::$appkey);
        return Curl::post(self::PUSH_URI, $push);
    }

    /* 全量推送*/
    public static function pushAll($workNo, $title, $content)
    {
        $pushWorkBuilder = new PushWorkBuilder();
        return self::pushTaskV3($pushWorkBuilder
            ->setTargetAll($workNo, $title, $content)
            ->builder()
        );
    }

    /* 别名推送 */
    public static function pushByAlias($workNo, $title, $content, ...$alias)
    {
        $pushWorkBuilder = new PushWorkBuilder();
        return self::pushTaskV3($pushWorkBuilder
            ->setTargetByAlias($workNo, $title, $content, $alias)
            ->builder()
        );
    }

    /* 标签推送 */
    public static function pushByTags($workNo, $title, $content, ...$tags)
    {
        $pushWorkBuilder = new PushWorkBuilder();
        return self::pushTaskV3($pushWorkBuilder
            ->setTargetTags($workNo, $title, $content, $tags)
            ->builder()
        );
    }

    /* reg id 推送 */
    public static function pushByRids($workNo, $title, $content, ...$rids)
    {
        $pushWorkBuilder = new PushWorkBuilder();
        return self::pushTaskV3($pushWorkBuilder
            ->setTargetRids($workNo, $title, $content, $rids)
            ->builder()
        );
    }

    /* 地理位置推送 */
    public static function pushByAreas($workNo, $title, $content, ...$pushAreas)
    {
        $pushWorkBuilder = new PushWorkBuilder();
        return self::pushTaskV3($pushWorkBuilder
            ->setTargetByAreas($workNo, $title, $content, $pushAreas)
            ->builder()
        );
    }

    /* 取消推送任务 */
    public static function cancelPushTask($workId)
    {
        return Curl::getResult(self::CANCEL_TASK_URI, ['batchId' => $workId]);
    }

    /* 替换推送任务 */
    public static function replacePushTask($workId, $content)
    {
        $params['batchId'] = $workId;
        $params['content'] = $content;
        return Curl::getResult(self::REPLACE_TASK_URI, $params);
    }

    /* 撤回推送任务 */
    public static function recallPushTask($workId)
    {
        return Curl::getResult(self::RECALL_TASK_URI, ['batchId' => $workId]);
    }

    /* 获取推送信息 */
    public static function getPushByWorkId($batchId)
    {
        return Curl::getResult(self::GET_BY_WORK_ID_URI, ['workId' => $batchId]);
    }

    /* 获取推送信息 */
    public static function getPushByWorkno($workno)
    {
        return Curl::getResult(self::GET_BY_WORK_NO_URI, ['workno' => $workno]);
    }
}
