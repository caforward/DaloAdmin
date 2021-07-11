<?php
namespace app\index\controller;
use app\index\controller\Base;
class Article extends Base
{
    public function index()
    {
    	$arid=input('arid');
    	$articleres=db('article')->find($arid);
    	$this->assign('articleres',$articleres);
    	return $this->fetch('article');
    }
    
}
