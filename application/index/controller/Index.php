<?php
namespace app\index\controller;
use think\Controller;
use think\Image;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        // return ROOT_PATH;
        return $this->fetch();
    }
    
    public function index1(){
    	$this->redirect('stu/index',['id'=>2]);
       // echo "index1";
    }
    public function upload(){
    	// halt($_FILES);
    	// 获取表单上传文件 例如上传了001.jpg
		$file = request()->file('myfile');
		// dump($file);
		// halt(input());
		// 移动到框架应用根目录/public/uploads/ 目录下
		$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		if($info){
		// 成功上传后 获取上传信息
		// 输出 jpg
		// echo $info->getExtension()."<br>";
		// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		// echo $info->getSaveName()."<br>";
		// 输出 42a79759f284b767dfcb2a0197904287.jpg
		// echo $info->getFilename()."<br>";

		//成功上传
        //获取文件路径
        $str =  $info->getSavename();
        // halt($str);
        //获取文件名
        $filename = $info->getFilename();
        //获取路径名
        $string = strstr($str,DS,true);
        
        $image = Image::open($file);
        // halt($image);
        // dump($image);die;
        $image->thumb(200,200)->save(ROOT_PATH."public".DS."uploads".DS.$string.DS."m_".$filename);
        // echo DS."uploads".DS.$string.DS."m_".$filename;
        $data['picname'] = DS."uploads".DS.$string.DS."m_".$filename;
        Db::table('pic')->insert($data);
        echo 1;
		}else{
		// 上传失败获取错误信息
		echo $file->getError();
		}
    }

    public function pic(){
       $list = Db::table('pic')->select();
       $this->assign('list',$list);
       return $this->fetch();
    }

    public function update(){
        $id['id'] = input('post.id');
        $pic = Db::table('pic')->where($id)->find();
        // halt($pic);
        $url=$_SERVER["DOCUMENT_ROOT"].$pic['picname'];
        // halt($url);
        unlink($url);
        // Db::table('pic')->delete($id);   
    }

    public function ajaxupload(){
        
    }
}
