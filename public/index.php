<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
// if(file_exists("./Public/install") && !file_exists("./Public/install/install.lock")){
//     // 组装安装url
//     $url=$_SERVER['HTTP_HOST'].trim($_SERVER['SCRIPT_NAME'],'index.php').'Public/install/index.php';
//     // 使用http://域名方式访问；避免./Public/install 路径方式的兼容性和其他出错问题
//     header("Location:http://$url");
//     die;
// }
// // 检测PHP环境
// if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
define('SITE_URL', 'http://gz.dqxx.com/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
