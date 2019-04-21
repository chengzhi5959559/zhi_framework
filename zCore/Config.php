<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/24
 * +----------------------------------------------------------------------
 * | Time: 15:14
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;


class Config implements \ArrayAccess
{
   protected $path;
   protected $configs = [];
   public function __construct( $path ) {
     $this->path = $path;
   }
   
   public function offsetGet($key)
   {
       // TODO: Implement offsetGet() method.
       if (empty($this->configs[$key])) {
          $file_path = $this->path .'/' . $key . '.php';
          $config = require $file_path;
          $this->configs[$key] = $config;
       }
       return $this->configs[$key];
   }
   public function offsetSet($key, $value)
   {
       // TODO: Implement offsetSet() method.
       throw new \Exception('connot write config file.');
   }
   public function offsetExists($key)
   {
       // TODO: Implement offsetExists() method.
       return isset($this->configs[$key]);
   }
   public function offsetUnset($key)
   {
       // TODO: Implement offsetUnset() method.
       unset($this->configs[$key]);
   }
   
    
}