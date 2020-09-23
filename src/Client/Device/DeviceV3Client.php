<?php

namespace MobTech\MobPush\Client\Device;

use MobTech\MobPush\Builder\PushDeviceBuilder;
use MobTech\MobPush\Util\Curl;

class DeviceV3Client
{
    const GET_BY_RID = 'device-v3/getById/';
    const GET_DEVICE_DISTRIBUTION = 'device-v3/distribution/';
    const GET_BY_ALIAS = 'device-v3/getByAlias/';
    const UPDATE_BY_ALIAS = 'device-v3/upateByAlias/';
    const UPDATE_BY_TAGS = 'device-v3/upateByTags';

    const UPDATE_ALIAS = 'device-v3/updateAlias/';
    const UPDATE_TAGS = 'device-v3/updateTags';
    const QUERY_BY_TAGS = 'device-v3/queryByTags';

    /* 根据rid查询设备信息接口 */
    public static function getByRid($registrationId)
    {
        return Curl::get(self::GET_BY_RID . $registrationId);
    }

    /* 查询设备分布情况 */
    public static function getDeviceDistribution()
    {
        return Curl::get(self::GET_DEVICE_DISTRIBUTION);
    }

    /* 根据别名查询设备信息 */
    public static function queryByAlias($alias)
    {
        return Curl::get(self::GET_BY_ALIAS . $alias);
    }

    /* 根据别名查询设备信息 */
    public static function updateAlias($alias, $registrationId)
    {
        return Curl::post(self::UPDATE_ALIAS, (new PushDeviceBuilder())
            ->alias($alias)
            ->registrationId($registrationId)
            ->builder());
    }

    /* 根据标签查询设备信息 */
    public static function queryByTags($tags)
    {
        return Curl::post(self::QUERY_BY_TAGS, (new PushDeviceBuilder())
            ->appkey()
            ->tags($tags)
            ->builder());
    }

    /* 更新设备标签 */
    public static function updateTags($tags, $registrationId, $opType)
    {
        return Curl::post(self::UPDATE_TAGS, (new PushDeviceBuilder())
            ->tags($tags)
            ->registrationId($registrationId)
            ->opType($opType)
            ->builder());
    }
}
