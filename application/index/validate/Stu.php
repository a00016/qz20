<?php  
namespace app\index\validate;
use think\Validate;
class Stu extends Validate
{
	//定义验证规则
	protected $rule = [
		'classid'=>'require|number',
		// chsDash验证某个字段的值只能是汉字、字母、数字和下划线_及破折号-
		'name' => 'require|length:4,25|chsDash',
		// between验证某个字段的值是否在某个区间
        'age' => 'require|between:1,120'
	];

	//定义验证错误输出信息
	protected $message = [
		'classid.require'=>'班级为必填项',
		'classid.number'=>'班级不合法规则',
		'name.require' => '请填写姓名',
		'name.length' => '长度不符合要求',
		'name.chsDash' => '名字含有非法字符',
		'age.between' => '非法年龄'
	];

	//定义验证场景
	protected $scene = [
		'update' => 'name,age',
		'name'=>'name',
		'age'=>'age'
	];
}
?>