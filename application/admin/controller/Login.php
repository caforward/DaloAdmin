<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Admin;
class Login extends Controller 
{
    public function index(){
        if(request()->isPost()){
            $admin=new Admin();
            $data=input('post.');
            if($admin->login($data)==3){
                $this->success('信息正确','index/index');
            }else{
                $this->error('用户名或密码错误！');
            }
        }
        return $this->fetch('login');
    }
}


