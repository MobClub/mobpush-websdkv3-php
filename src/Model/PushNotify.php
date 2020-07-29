<?php

namespace MobTech\MobPush\Model;

class PushNotify extends Obj implements \JsonSerializable
{
    /**
     * 是否是定时任务：0否，1是，默认0
     */
    protected $taskCron = 0;

    /**
     * 定时消息 发送时间
     */
    protected $taskTime;

    /**
     * 可使用平台，1 android;2 ios ;3 winPhone(暂不使用) ;
     */
    protected $plats = [1, 2];

    /**
     * plat = 2下，0测试环境，1生产环境，默认1
     */
    protected $iosProduction = 1;

    /**
     * 离线时间，秒
     */
    protected $offlineSeconds = 3600;

    /**
     * 推送标题
     */
    protected $title;

    /**
     * 推送内容
     * NotEmpty(message = "推送消息不能为空")
     */
    protected $content;

    /**
     * 推送类型：1通知；2自定义
     * NotNull(message = "消息类型不能为空")
     * Determine(values = {1, 2}, message = "消息类型1：通知，2：自定义")
     */
    protected $type = 1;

    /**
     * 自定义内容, type=2
     * CustomMessage.class
     */
    protected $customNotify;

    /**
     * android通知消息, type=1, android
     * AndroidNotify.class
     */
    protected $androidNotify;

    /**
     * ios通知消息, type=1, ios
     * IosNotify.class
     */
    protected $iosNotify;

    /**
     * 打开链接
     */
    protected $url;

    /**
     * 附加字段键值对的方式
     */
    protected $extrasMapList;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}