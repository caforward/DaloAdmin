<?php
namespace app\admin\model;
use think\Model;
class Article extends Model{
	// 多个文章属于一个栏目 一对多关联 第一个是属于 第二个是外键
	public function cate(){
        return $this->belongsTo('cate','cateid')->order('id DESC');
    }
}