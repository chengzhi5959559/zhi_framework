<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/18
 * +----------------------------------------------------------------------
 * | Time: 00:12
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore\Decorate;

/*颜色装饰器*/
class ColorDrawDecorate implements DrawDecorate
{
    protected $color;
    public function __construct($color)
    {
       $this->color = $color;
    }
   
    public function beforeDraw()
    {
        echo "<div style='color: {$this->color};'>";
    }
    public function afterDraw()
    {
        echo "</div>";
    }
}