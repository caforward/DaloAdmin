<?php
namespace app\index\controller;
use think\Controller;
class Base extends Controller 
{
    public function _initialize()
    {
    	$cateres=db('cate')->order('id asc')->select();
    	$this->assign('cateres',$cateres);

    	$list=db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.desc,a.time,a.state,c.catename')->paginate(5);
        $this->assign('list',$list);
    }
    
}
