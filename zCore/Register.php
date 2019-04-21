<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 18:04
 * +----------------------------------------------------------------------
 */
namespace Framework\zCore;
/*注册树模式*/
class Register {
   protected static $objects;
    
    /**
     * @desc 往树里注册数据
     * @param $alias
     * @param $object
     */
   public static function set ($alias, $object) {
     self::$objects[$alias] = $object;
   }
    
    /**
     * @desc 从树里获取数据
     * @param $alias
     * @return bool
     */
   public static function get ($alias) {
     if (!isset(self::$objects[$alias])) {
        return false;
     }
     return self::$objects[$alias];
   }
    
    /**
     * @desc 从树里卸载数据
     * @param $alias
     */
   public static function _unset ($alias) {
     unset(self::$objects[$alias]);
   }
   
}