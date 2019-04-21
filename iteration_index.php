<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/23
 * +----------------------------------------------------------------------
 * | Time: 16:22
 * +----------------------------------------------------------------------
 */

ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');

$medicines = new \Framework\zCore\Iteration\AllUser();
//遍历对象
foreach ($medicines as $med) {
   var_dump($med->medicine_name);
   $med->update_time = time();
}