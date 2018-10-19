<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Stu as Student;

//学生信息控制类
class Stu extends Controller{
    //浏览学生信息
    public function index(){
        $list = Student::destroy(11);
        halt($list);
        $this->assign("list",$list);
        return $this->fetch("index");
    }
    
    //加载添加学生信息表单
    public function add(){
        return $this->fetch("add");
    }
    
    //执行学生信息添加
    public function insert(){
        //创建请求对象
        $request = Request::instance();
        //获取post提交数据
        $data = $request->post();
        //var_dump($data);
        //执行添加
        $m = Db::table("stu")->insert($data);
        if($m>0){
            $this->success("添加成功！","index");
        }else{
            $this->error("添加失败！");
        }
    }
    
    //执行学生信息删除
    public function del($id){
        //执行删除
        $m = Db::table("stu")->delete($id);
        if($m>0){
            $this->success("删除成功！","index");
        }else{
            $this->error("删除失败！");
        }
    }
    
    //执行学生信息修改
    public function update(){

        /*//使用助手函数实例化一个验证器类
        $validate = validate('Stu');
        //验证提交数据
        if (!$validate->scene('update')->check(input('post.'))) {
            $this->error($validate->getError());
        }*/

        $result = $this->validate(
        [
        'name' => 'thinkphp',
        'age' => 332,
        ],
        [
        'name' => 'require|max:25',
        'age' => 'require|between:1,120',
        ]);
        if(true !== $result){
        // 验证失败 输出错误信息
        $this->error($result);
        }


       /* //创建请求对象
        $request = Request::instance();
        //获取post提交数据
        $data = $request->post();
        //执行修改
        $m = Db::table("stu")->update($data);
        if($m>0){
            $this->success("修改成功！","index");
        }else{
            $this->error("修改失败！");
        }*/
    }
    
    //加载修改学生信息表单
    public function edit($id){
        //获取学生信息
        $stu = Db::table("stu")->find($id);
        //将要修改的学生信息放置到模板中
        $this->assign("stu",$stu);
        //加载模板
        return $this->fetch("edit");
    }
}