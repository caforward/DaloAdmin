<?php
namespace app\admin\validate;
use think\Validate;

class Cate extends Validate
{
    //验证规则
    protected $rule = [
        'catename'  =>  'require|max:25',
    ]; 
    //验证提示
    protected $massage=[
        'catename.require'=>'栏目名称必需填写',
        'catename.max'=>'栏目名称长度不得大于25位',
        'catename.unique'=>'栏目名称不得重复',
    ];
    //验证场景
      protected $scene = [
        'add'  =>  ['catename'=>'require',],
        'edit'=>['catename'=>'require'],
    ];
}