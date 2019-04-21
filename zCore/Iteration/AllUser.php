<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/23
 * +----------------------------------------------------------------------
 * | Time: 16:30
 * +----------------------------------------------------------------------
 */
//迭代器
namespace Framework\zCore\Iteration;


use Framework\zCore\Factory;

class AllUser implements \Iterator
{
    protected $ids;
    protected $data = [];
    protected $index;
    
    public function __construct()
    {
       $db = Factory::getDatabase();
       $result = $db->query("select med_id from cy_medicine");
       $this->ids =$result->fetch_all(MYSQLI_ASSOC);
    }
    public function current()
    {
        // TODO: Implement current() method.
        $id = $this->ids[$this->index]['med_id'];
        return Factory::getUser($id);
    }
    public function next()
    {
        // TODO: Implement next() method.
        $this->index++;
    }
    public function valid()
    {
        // TODO: Implement valid() method.
        return $this->index < count($this->ids);
    }
    
    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->index = 0;
    }
    public function key()
    {
        // TODO: Implement key() method.
        return $this->index;
    }
}