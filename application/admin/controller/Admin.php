<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Loader;
use app\admin\model\Admin as AdminModel;
class Admin extends Base 
{
    
    //admin管理类表
	public function lst()
    {
        $list=AdminModel::paginate(5);
        $this->assign('list',$list);
    	return $this->fetch();

    }
    public function add()
    {
    	if(request()->isPost()){
 			//独立验证器验证
			$validate = Loader::validate('Admin');
			//传入参数
    		$data=[
    			'username'=>input('username'),//第一个是来自数据库的username，第二个是来自表单提交的username
    			'password'=>md5(input('password')),
    		];
    		//独立验证器判断
    		if (!$validate->scene('add')->check($data)) {
    			$this->error($validate->getError());
    			die;
			}
			//判断数据库名tp_admin是否添加了$data
    		if(DB::name('admin')->insert($data)){
    			return $this->success('添加管理员成功！','lst');
    		}else{
    			return $this->error('添加管理员失败！');
    		}
    		return;
    	}

    	return $this->fetch();

    }
    //修改模块
    public function exit()
    {
        $id=input('id');
        $cate=db('cate')->find($id);
        $admins=db('admin')->find($id);
        $this->assign('admins',$admins);
        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'username'=>input('username'),
            ];
            //if input password is none else not change password! 如果输入的密码为空,则更新为dbAdminPassword原密码
            if(input('password')){
                $data['password']=md5(input('password'));
            }else if(input('password')==$admins['password']){
                $data['password']=$admins['password'];
            }else{
                $data['password']=$admins['password'];
            };
            //独立验证器验证
            $validate = Loader::validate('Admin');
            //独立验证器判断
            if (!$validate->scene('exit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            //update db admin $data
            if(db('admin')->update($data)){
                $this->success('修改管理员成功！','lst');
            }else{
                $this->error('修改管理员失败！');
            }
            return;
        }
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    public function del()
    {
        $id=input('id');
        if($id!=1){
            if(db('admin')->delete(input('id'))){
                $this->success('删除管理员成功！','lst');
            }else{
                $this->error('删除管理员失败！');
            }
        }else{
            $this->error('Admin不可以被删除！');
        }
    }
    public function logout()
    {
        session(null);
        $this->success('退出成功','Login/index');
    }
}


