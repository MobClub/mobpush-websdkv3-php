<?php

namespace MobTech\MobPush\Model;

use MobTech\MobPush\Model\Obj;

class PushTarget extends Obj implements \JsonSerializable
{

    /**
     * 推送范围:0 全部；1广播；2别名；3标签；4regid；5地理位置；7智能标签;8短信补量; 9复杂地理位置
     * WorkDetailTargetEnum
     *
     * NotNull
     * Determine(values = {1, 2, 3, 4, 5, 7,8, 9}, message = "推送消息target错误")
     */
    protected $target;

    /**
     * target:3 => 设置推送标签集合["tag1","tag2"]
     */
    protected $tags;

    /**
     * target:3 => 标签组合方式：1并集；2交集；3补集(3暂不考虑)
     */
    protected $tagsType = 1;

    /**
     * target:2 => 设置推送别名集合["alias1","alias2"]
     */
    protected $alias;

    /**
     * target:4 => 设置推送Registration Id集合["id1","id2"]
     */
    protected $rids;

    /**
     * target:6 => 用户分群ID
     */
    protected $block;

    /**
     * target:5 => 推送地理位置
     */
    protected $country;
    protected $province;
    protected $city;

    /**
     * target:7 =
     * 智能标签列表, 关联关系为与, 必须同时满足条件
     */
    protected $smartLabels;

    /**
     * target:8
     * 短信补量
     */
    // protected List<PushSmsSupply> smsSupply;

    protected $pushAreas;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}