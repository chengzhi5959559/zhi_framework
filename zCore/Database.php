<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 17:32
 * +----------------------------------------------------------------------
 */
namespace Framework\zCore;

class Database {
  static private $db;
  private function __construct(){
  }
  private function __clone() {
  }
    
    /**
     * @return Database
     */
  public static function getInstance () {
     if (!self::$db instanceof self) {
        self::$db = new self();
        return self::$db;
     }
     return self::$db;
  }
  public function query ($sql) {
    echo "SQL: $sql . \n";
  }
  
}