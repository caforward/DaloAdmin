<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    //验证规则
    protected $rule = [
        'username'  =>  'require|max:25',
        'password' =>  'require',
    ]; 
    //验证提示
    protected $massage=[
        'username.require'=>'用户名名称必需填写',
        'username.max'=>'用户名名称长度不得大于25位',
        'password.require'=>'用户密码必须填写',
    ];
    //验证场景
      protected $scene = [
        'add'  =>  ['username','password'],
        'edit'=>['username'=>'require'],
    ];
}