<?php
/**
 * Created by PhpStorm.
 * User: mober
 * Date: 23/7/21
 * Time: 下午2:25
 */

namespace MobTech\MobPush\Builder;

use MobTech\MobPush\Model\PushAreas;

class PushAreasBuilder
{
    private $pushAreas;

    public function __construct()
    {
        $this->pushAreas = new PushAreas();
    }

    public function builder()
    {
        return $this->builder();
    }

    public function buildCountries($countries)
    {
        $this->pushAreas->setCountries($countries);
    }
}
