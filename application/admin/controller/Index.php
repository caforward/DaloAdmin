<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Index extends Base 
{
	public function index()
    {
        $catec=db('cate')->count();
        $this->assign('catec',$catec);
        $artc=db('article')->count();
        $this->assign('artc',$artc);
        $adminc=db('admin')->count();
        $this->assign('adminc',$adminc);
        
        $dfb=db('article')->where('state','=',0)->count();
        $this->assign('dfb',$dfb);
        $yfb=db('article')->where('state','=',1)->count();
        $this->assign('yfb',$yfb);
    	return $this->fetch();
    }
}


