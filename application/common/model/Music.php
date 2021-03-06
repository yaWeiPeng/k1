<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Music extends Model
{
	use SoftDelete;
	protected $deleteTime = 'delete_time';
	
	protected $table = 'k_music';
	protected $pk = 'id';
	
	//获取器修改状态
	public function getStateAttr($value){
		$state = [0=>'隐藏',1=>'显示'];
		return ['state'=>$value,'text'=>$state[$value]];
	}
	
}