<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 23:12
 * +----------------------------------------------------------------------
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');

class Event extends \Framework\zCore\Observer\EventGenerator {
   public function trigger () {
      echo "Event \n";
      $this->notify();
   }
}
class Observer1 implements \Framework\zCore\Observer\Observer {
   public function update ($event_info = null) {
     echo '逻辑1'."\n";
   }
}
class Observer2 implements \Framework\zCore\Observer\Observer {
    public function update ($event_info = null) {
        echo '逻辑2'."\n";
    }
}

$event = new Event();
$event->addObserver(new Observer1);
$event->addObserver(new Observer2);
$event->trigger();

/**
 * 执行流程分析：
 * 1，创建事件，$event = new Event();
 * 2，添加观察者 $event->addObserver(new Observer1);
 * 3，触发事件，进行通知操作 Event->notify()
 * 4,各个观察者做相关的操作，$observer->update();
 *
 */