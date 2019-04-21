<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 17:29
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;

class Factory {
  public static $proxy = null;
  public static $db;
  public static function getDatabase( $id = 'proxy' ) {
     if ($id == 'proxy') {
        if (!self::$proxy) {
           self::$proxy = new \Framework\zCore\Proxy\Proxy();
        }
        return self::$proxy;
     }
     
     $key ='database_' . $id;
     if ($id == 'slave') {
        $slaves = Application::getInstance()->config['database']['slave'];
        $db_conf =$slaves[array_rand($slaves)]; //随机获取从数据库
     } else {
        $db_conf = Application::getInstance()->config['database'][$id];
     }
     $db = Register::get($key);
     if (!$db){
       $db = new Database\mysqli();
       $db->connect($db_conf['host'],$db_conf['user'],$db_conf['password'],$db_conf['port'],$db_conf['dbname']);
       Register::set($key, $db);
     }
     return $db;
  }
  //获取Model实例
  public static function getModel ($name) {
     $key = 'app_model_'.$name;
     $model = Register::get($key);
     if (!$model) {
       $class = '\\App\\Model\\'.ucwords($name);
       $model = new $class;
       Register::set($key, $model);
     }
     return $model;
  }
  public static function getUser($id) {
      $key = 'user_'.$id;
      $user = Register::get($key);
      if (!$user) {
          $user = new User($id);
          
          Register::set($key, $user);
      }
      return $user;
  }
}