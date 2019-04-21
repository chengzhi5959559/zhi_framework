<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/24
 * +----------------------------------------------------------------------
 * | Time: 16:38
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;


class Application
{
    public $base_dir;
    public static $instance;
    public $config;
    
    protected function __construct($base_dir) {
       $this->base_dir = $base_dir;
       $this->config = new Config($base_dir . '/configs');
    }
    public static function getInstance ($base_dir='') {
       if (null !== static::$instance) {
         return static::$instance;
       }
       static::$instance = new static($base_dir);
       return static::$instance;
    }
    
    /**
     * @desc 业务分发
     */
    public function dispatch () {
       $uri = $_SERVER['PATH_INFO'];
       list($c, $v) = explode('/',trim($uri,'/'));
       $c_low = strtolower($c);
       $c = ucwords($c);
       $class = '\\App\\Controller\\' . $c;
       $obj = new $class($c,$v);
       
       $controller_config = $this->config['controller'];
       $decorators = [];
       if (isset($controller_config[$c_low]['decorator'])) {
          $conf_decorator = $controller_config[$c_low]['decorator'];
          foreach ($conf_decorator as $class) {
             $decorators[] = new $class;
          }
       }
       //调用控制器方法之前
       foreach ($decorators as $decorator) {
          $decorator->beforeRequest($obj);
       }
       
       $return_value = $obj->$v();
       //调用控制器方法之后
       foreach ($decorators as $decorator) {
          $decorator->afterRequest($return_value);
       }
    }
}