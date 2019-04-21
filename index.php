<?php
/**
 * +----------------------------------------------------------------------
 * | Created by .诚挚先生
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 17:14
 * +----------------------------------------------------------------------
 */
 ini_set('display_errors',1);
 error_reporting(E_ALL);
 define('ROOT_PATH', __DIR__);
 require ROOT_PATH . '/zCore/loader.php';
 
 $loader = new \Framework\zCore\Ps4AutoloaderClass();
 $loader->register();
 $loader->addNamespace('\Framework\zCore',ROOT_PATH.'/zCore');
 $loader->addNamespace('\App\Controller', ROOT_PATH.'/App/Controller');
 $loader->addNamespace('\App\Decorator', ROOT_PATH.'/App/Decorator');
 $loader->addNamespace('\App\Model', ROOT_PATH.'/App/Model');
 $loader->addNamespace('\App\observer', ROOT_PATH.'/App/observer');
 
 \Framework\zCore\Application::getInstance(__DIR__)->dispatch();