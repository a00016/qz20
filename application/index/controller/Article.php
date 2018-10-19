<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Article as atr;
use app\index\model\Stu as stu;
class Article extends Controller
{
    public function test(){
        $Article = stu::get(1);
        // 输出Profile关联模型的email属性
        dump($Article->fun->toArray());
    }
}
