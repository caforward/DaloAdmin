<?php
namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
    //验证规则
    protected $rule = [
        'title'  =>  'require',
        'cateid' =>  'require',
    ]; 
    //验证提示
    protected $massage=[
        'title.require'=>'title文章标题必需填写',
        'cateid.require'=>'cateid文章栏目必须填写',
    ];
    //验证场景
      protected $scene = [
        'add'  =>  ['title','cateid'],
        'edit'=>['title'=>'require','cateid'=>'require',],
    ];
}