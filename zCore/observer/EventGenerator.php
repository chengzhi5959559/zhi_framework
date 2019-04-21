<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 23:16
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore\Observer;

/*事件生产者*/
abstract class EventGenerator
{
    private $observers = [];
    
    /**
     * @desc 增加观察者
     * @param Observer $observer
     */
    public function addObserver(Observer $observer){
       $this->observers[] = $observer;
    }
    
    /**
     * @desc 通知观察者做相应的动作
     */
    public function notify () {
       foreach ($this->observers as $observer) {
          $observer->update();
       }
    }
}