<?php
/**
 * Created by PhpStorm.
 * User: mober
 * Date: 23/7/21
 * Time: 下午2:25
 */

namespace MobTech\MobPush\Builder;

use MobTech\MobPush\Model\PushCountry;

class PushCountryBuilder
{
    private $pushCountry;

    public function __construct()
    {
        $this->pushCountry = new PushCountry();
    }

    public function builder()
    {
        return $this->builder();
    }

    public function buildPushCountry($pushCountry)
    {
        $this->pushCountry->setCountry($pushCountry);
    }

    public function buildPushProvince($pushProvince)
    {
        $this->pushCountry->setProvinces($pushProvince);
    }

    public function buildExcludeProvinces($province)
    {
        $this->pushCountry->setExcludeProvinces($province);
    }
}
