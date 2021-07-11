<?php
namespace app\admin\validate;
use think\Validate;

class Links extends Validate
{
    //验证规则
    protected $rule = [
        'title'  =>  'require|max:25',
        'url' =>  'require',
    ]; 
    //验证提示
    protected $massage=[
        'title.require'=>'用户名名称必需填写',
        'title.max'=>'用户名名称长度不得大于25位',
        'url.require'=>'用户密码必须填写',
    ];
    //验证场景
      protected $scene = [
        'add'  =>  ['title','url'],
        'edit'=>['title'=>'require','url'=>'require',],
    ];
}