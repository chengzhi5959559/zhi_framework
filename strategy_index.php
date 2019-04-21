<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 19:57
 * +----------------------------------------------------------------------
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');

class page {
     protected $strategy;
     public function index () {
        $this->strategy->showAd();
        $this->strategy->showCategory();
        
     }
     
     public function setStrategy(\Framework\zCore\UserStrategy $strategy) {
        $this->strategy = $strategy;
     }
}

$page = new Page;

if (isset($_GET['action']) && $_GET['action'] == 'female') {
  $strategy = new \Framework\zCore\FemaleStrategy();
} else {
  $strategy = new \Framework\zCore\MaleStrategy();
}
$page->setStrategy($strategy);
$page->index();

