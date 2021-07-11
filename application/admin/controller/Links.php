<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Loader;
use app\admin\model\Links as LinksModel;
class Links extends Base
{
    //admin管理类表
	public function lst()
    {
        $list=LinksModel::paginate(5);
        $this->assign('list',$list);
    	return $this->fetch();

    }
    public function add()
    {
    	if(request()->isPost()){
 			//独立验证器验证
			$validate = Loader::validate('Links');
			//传入参数
    		$data=[
    			'title'=>input('title'),
    			'url'=>input('url'),
                'desc'=>input('desc'),
    		];
    		//独立验证器判断
    		if (!$validate->scene('add')->check($data)) {
    			$this->error($validate->getError());
    			die;
			}
			//判断数据库名tp_admin是否添加了$data
    		if(DB::name('links')->insert($data)){
    			return $this->success('添加链接成功！','lst');
    		}else{
    			return $this->error('添加链接失败！');
    		}
    		return;
    	}

    	return $this->fetch();

    }

    //修改模块 exit
    public function exit()
    {
        $id=input('id');
        $links=db('Links')->find($id);

        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'url'=>input('url'),
                'desc'=>input('desc'),
            ];
            //if input password is none else not change password! 如果输入的密码为空,则更新为dbAdminPassword原密码
            if(input('title')){
                $data['title']=input('title');
            }

            if(input('url')){
                $data['url']=input('url');
            }
            if(input('desc')){
                $data['desc']=input('desc');
            }

            //独立验证器验证
            $validate = Loader::validate('Links');
            //独立验证器判断
            if (!$validate->scene('exit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            //update db admin $data
            if(db('links')->update($data)){
                $this->success('修改链接成功！','lst');
            }else{
                $this->error('修改链接成功！','lst');
            }
            return;
        }
        $this->assign('links',$links);
        return $this->fetch();
    }
    public function del()
    {
        $id=input('id');
            if(db('links')->delete(input('id'))){
                $this->success('删除管理员成功！','lst');
            }else{
                $this->error('删除管理员失败！');
            }
        
    }
}


