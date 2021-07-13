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
    public function fabu()
    {   
        $pub=db('article')->whereTime('stime', '<=', 'today')->update(['state' => '1']);
        dump($pub);
    }
}
