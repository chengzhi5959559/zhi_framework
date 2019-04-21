<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/25
 * +----------------------------------------------------------------------
 * | Time: 12:04
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;


class Model
{
    //观察者集合
    protected $observers = [];
    public function __construct()
    {
       $name = strtolower(str_replace('App\Model\\','',get_class($this)));
       $config = Application::getInstance()->config['model'];
       if (!empty($config[$name]['observer'])) {
          $observers = $config[$name]['observer'];
          foreach ($observers as $class) {
            $this->observers[] = new $class;
          }
       }
    }
    //触发通知
    public function notify ($evnet) {
       foreach ($this->observers as $observer) {
          $observer->update($evnet);
       }
    }
}