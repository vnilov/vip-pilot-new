<?php

/**
 * Created by PhpStorm.
 * User: vnilov
 * Date: 3/17/17
 * Time: 11:54 AM
 */
namespace App\Utilities;

use \Yandex\Metrica\Stat\StatClient;

class Metrica
{
    private static $instance;
    private $token;
    private $counter_id;
    
    public static function i()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct()
    {
        $this->token = "AQAAAAAAqW-ZAAQivjhzrgbzL0XXvkZoaa6xhS8";
        $this->counter_id = 43526754;
    }

    function getTodayVisitors()
    {
        $statClient = new StatClient($this->token);
        $paramsModel = new \Yandex\Metrica\Stat\Models\ByTimeParams();
        $paramsModel
	    ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_USERS)
            ->setId($this->counter_id)
            ->setDate1('today')
            ->setDate2('today')
            ->setGroup('day');
        $data = $statClient->data()->getByTime($paramsModel)->getTotals();
        return $data;
    }    
    function getTodayViews()
    {
        $statClient = new StatClient($this->token);
        $paramsModel = new \Yandex\Metrica\Stat\Models\ByTimeParams();
        $paramsModel
            ->setMetrics(\Yandex\Metrica\Stat\MetricConst::S_HITS)
            ->setId($this->counter_id)
            ->setDate1('today')
            ->setDate2('today')
            ->setGroup('day');
        $data = $statClient->data()->getByTime($paramsModel)->getTotals();
        return $data;
    }
    
}