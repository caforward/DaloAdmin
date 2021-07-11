DaloAdmin V1.0
===============

DaloAdmin后端PHP框架，采用了ThinkPHP5框架，本框架秉承安全 实用 高效 自动化设计理念

V1.0后台系统主要功能 管理员设置 栏目管理 友情链接管理 文章管理 文章列表 标签管理

后端产品特性：

 + 文章自动采集，可设置定时发布
 + 后端框架页面自适应显示
 + 文章新建与编辑采用了百度UEditor编辑器

> ThinkPHP5的运行环境要求PHP5.4以上。

项目案例： [哈尔滨德强高中作业答案发布平台](http://dqxx.ahgou.top)

## 目录结构

初始的目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─admin				Admin模块
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  │	 ├─Admin.php    管理员表控制器
│  │  │	 ├─Article.php  	文章控制器
│  │  │	 ├─Base.php     	Base控制器
│  │  │	 ├─Cate.php     	栏目控制器
│  │  │	 ├─Index.php    	后台首页控制器
│  │  │	 ├─Links.php    	友情链接控制器
│  │  │	 ├─Login.php    	登录控制器
│  │  ├─model           模型目录
│  │  │	 ├─Admin.php    	管理员表模组
│  │  │	 ├─Article.php  	文章模组
│  │  │	 ├─Cate.php     	栏目模组
│  │  │	 ├─Links.php    	友情链接模组
│  │  │	 ├─Login.php    	登录模组
│  │  ├─validate        验证器目录
│  │  │	 ├─Admin.php    	管理员表验证器
│  │  │	 ├─Article.php  	文章验证器
│  │  │	 ├─Cate.php     	栏目验证器
│  │  │	 ├─Links.php    	友情链接验证器
│  │  │	 ├─Login.php    	登录验证器
│  │  ├─view            视图目录
│  │  │	 ├─...			后端视图文件
│  ├─index             	Index模块（可以更改）
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  │	 ├─Article.php  	文章控制器
│  │  │	 ├─Base.php     	Base控制器
│  │  │	 ├─Cate.php     	栏目控制器
│  │  │	 ├─Index.php    	前台首页控制器
│  │  ├─view            视图目录
│  │  │	 ├─...          前端视图文件
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public   WEB目录（对外访问目录）
│  ├─static             静态资源存放位置   
│  │  ├─admin           admin公共资源目录
│  │  │	 ├─css  		后端css静态文件
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─README.md             README 文件
├─think                 命令行入口文件
~~~

## 版权信息

PHP框架采用ThinkPHP开发，后端页面设计采用BeyondAdmin

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2006-2018 by Dalo Co.,Ltd

All rights reserved。

DaloAdmin® 商标和著作权所有者为河东区超凡网络科技服务工作室。
