<?php

namespace MobTech\MobPush\Client\Stats;

use MobTech\MobPush\Util\Curl;

class StatsV3Client
{
    const GET_BY_WORK_ID_URI = '/v3/stats/getByWorkId';
    const GET_BY_WORK_IDS_URI = '/v3/stats/getByWorkIds';
    const GET_BY_WORKNO_URI = '/v3/stats/getByWorkno';
    const GET_BY_HOUR_URI = '/v3/stats/getByHour';
    const GET_BY_DAY_URI = '/v3/stats/getByDay';
    const GET_BY_DEVICE_URI = '/v3/stats/getByDevice';

    public static function getStatsByWorkId($workId)
    {
        $params['workId'] = $workId;
        return Curl::getResult(self::GET_BY_WORK_ID_URI, $params);
    }

    public static function getStatsByWorkIds($workIds)
    {
        $params['workIds'] = $workIds;
        return Curl::getResult(self::GET_BY_WORK_IDS_URI, $params);
    }

    public static function getStatsByWorkno($workno)
    {
        $params['workno'] = $workno;
        return Curl::getResult(self::GET_BY_WORKNO_URI, $params);
    }

    public static function getStatsByHour($hour)
    {
        $params['hour'] = $hour;
        return Curl::getResult(self::GET_BY_HOUR_URI, $params);
    }

    public static function getStatsByDay($day)
    {
        $params['day'] = $day;
        return Curl::getResult(self::GET_BY_DAY_URI, $params);
    }

    public static function getStatsByDevice($workId, $pageIndex, $pageSize)
    {
        $params['workId'] = $workId;
        $params['pageIndex'] = $pageIndex;
        $params['pageSize'] = $pageSize;
        return Curl::getResult(self::GET_BY_DEVICE_URI, $params);
    }
}
