<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 21:36
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;
/* 数据对象映射模式 */

class User
{
    protected $med_id;
    protected $db;
    protected $data;
    protected $change = false;
    public function __construct($id)
    {
       $this->db = Factory::getDatabase();
       $res = $this->db->query("select * from cy_medicine WHERE med_id = {$id}");
       $this->data = $res->fetch_assoc();
       $this->med_id = $id;
    }
    public function __get($key) {
       if (isset($this->data[$key])) {
          return $this->data[$key];
       }
    }
    public function __set($key, $value) {
       $this->data[$key] = $value;
       $this->change = true;
    }
    public function __destruct () {
       if($this->change) {
          foreach ($this->data as $k=>$v) {
             $fields[] ="$k='{$v}'";
          }
          $this->db->query(" UPDATE cy_medicine SET " . implode(', ', $fields) . " WHERE med_id={$this->med_id} limit 1 ");
       }
    }
}