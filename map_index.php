<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 21:30
 * +----------------------------------------------------------------------
 */

ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');
/*数据对象映射模式*/
class Page {
   public function index () {
      $user = Framework\zCore\Factory::getUser(13);
      var_dump($user);
      $user->medicine_name = '左弗沙星颗粒2';
   }
   
   public function test () {
       $user = Framework\zCore\Factory::getUser(13);
      var_dump($user);
       $user->medicine_name = '左弗沙星颗粒3';
   }

}

$page = new Page;

$page->index();
$page->test();