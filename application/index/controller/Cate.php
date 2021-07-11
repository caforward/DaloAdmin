<?php
namespace app\index\controller;
use app\index\controller\Base;
class Cate extends Base
{
    public function index()
    {
    	$cateid=input('cateid');
    	$articleres=db('article')->find($cateid);
    	$cates=db('cate')->find($cateid);
    	$this->assign('cates',$cates);
    	//关联查询cateid和catename
    	$cateid=input('cateid');
    	//分页输出数据库操作
        $list=db('article')->where(array('cateid'=>$cateid))->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.desc,a.time,a.state,c.catename')->paginate(10);
        $this->assign('list',$list);
        // 关联查询db(article)和db(cate)，第一个是join的表,第二个是条件
    	return $this->fetch('list');
    }
}
