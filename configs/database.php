<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/24
 * +----------------------------------------------------------------------
 * | Time: 15:48
 * +----------------------------------------------------------------------
 */
 $config = [
   'master' => [
      'type' => 'MYSQL',
      'host' => '127.0.0.1',
      'user' => 'root',
      'password' => 'root',
      'port' => '8890',
      'dbname' => 'jdcy',
   ],
   'slave' => [
      'slave1' => [
          'type' => 'MYSQL',
          'host' => '127.0.0.1',
          'user' => 'root',
          'password' => 'root',
          'port' => '8890',
          'dbname' => 'jdcy',
      ],
       'slave2' => [
           'type' => 'MYSQL',
           'host' => '127.0.0.1',
           'user' => 'root',
           'password' => 'root',
           'port' => '8890',
           'dbname' => 'jdcy',
       ],
   ]
 ];

return $config;