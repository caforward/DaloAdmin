<?php
namespace app\index\controller;
use app\index\controller\Base;
class Index extends Base
{
    public function index()
    {
    	$cateid=input('cateid');
    	$articleres=db('article')->select();
    	$this->assign('articleres',$articleres);

    	$links=db('links')->select();
    	$this->assign('links',$links);
    	return $this->fetch();
    }
}
