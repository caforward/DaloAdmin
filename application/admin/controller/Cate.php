<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Loader;
use app\admin\model\Cate as CateModel;
class Cate extends Base
{
    //admin管理类表
	public function lst()
    {
        $list=CateModel::paginate(5);
        $this->assign('list',$list);
    	return $this->fetch();

    }
    public function add()
    {
    	if(request()->isPost()){
 			//独立验证器验证
			$validate = Loader::validate('Cate');
			//传入参数
    		$data=[
                'state'=>input('state'),
    			'catename'=>input('catename'),//第一个是来自数据库的username，第二个是来自表单提交的username
    		];
    		//独立验证器判断
    		if (!$validate->scene('add')->check($data)) {
    			$this->error($validate->getError());
    			die;
			}
			//判断数据库名tp_admin是否添加了$data
    		if(DB::name('cate')->insert($data)){
    			return $this->success('添加栏目成功！','lst');
    		}else{
    			return $this->error('添加栏目失败！');
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

        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'state'=>input('state'),
                'catename'=>input('catename'),
            ];
            //if input password is none else not change password! 如果输入的密码为空,则更新为dbAdminPassword原密码
            if(input('catename')){
                $data['catename']=input('catename');
            }
            //独立验证器验证
            $validate = Loader::validate('Cate');
            //独立验证器判断
            if (!$validate->scene('exit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            //update db admin $data
            if(db('cate')->update($data)){
                $this->success('修改栏目成功！','lst');
            }else{
                $this->error('修改栏目失败！');
            }
            return;
        }
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    public function del()
    {
        $id=input('id');
            if(db('cate')->delete(input('id'))){
                $this->success('删除管理员成功！','lst');
            }else{
                $this->error('删除管理员失败！');
            }
    }
}


