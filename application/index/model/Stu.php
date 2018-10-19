<?php
namespace app\index\model;
use think\Model;

class Stu extends Model
{	
	public function fun()
	{	
		return $this->hasMany('article','sid','aid');
	}
	//获取器：获取器的作用是在获取数据的字段值后自动进行处理
	/*public function getsexAttr($value)
	{
		$sex = ['w'=>'女神','m'=>'帅哥',''=>''];
		return $sex[$value];
	}*/

	/*// 单独的模型类里面设置：自动添加时间戳
	protected $autoWriteTimestamp = true;

	// 自定义时间戳字段名
	protected $createTime = 'create_at';
	protected $updateTime = 'update_at';
*/
	// protected $autoWriteTimestamp = true;
	// public function setDelete_timeAttr($value)
	// {
	// 	return time();
	// }
	// use SoftDelete;
	// protected $deleteTime = 'delete_time';

	/*//设置只读字段
	protected $readonly = ['create_time'];

	//单独的模型类里面设置：自动添加时间戳
	protected $autoWriteTimestamp = true;

	//自动写入ip
	protected $auto = ['ip'];
	//修改器
	protected function setIpAttr()
	{
		return request()->ip();
	}*/
}