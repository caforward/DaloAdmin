<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;
use think\Loader;
use app\admin\model\Article as ArticleModel;
class Article extends Base 
{
    //文章一键发布功能
    public function fabu()
    {   
        $pub=db('article')->whereTime('stime', '<=', 'today')->update(['state' => '1']);
        dump($pub);
    }
    //admin管理类表
	public function lst()
    {   
        // $list=db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.desc,a.time,a.state,c.catename')->paginate(3);
        // 关联查询db(article)和db(cate)，第一个是join的表,第二个是条件
        $list=ArticleModel::paginate(10);
        $this->assign('list',$list);
    	return $this->fetch();
    }
    public function add()
    {
    	if(request()->isPost()){
			//传入参数
    		$data=[
                'title'=>input('title'),
                'author'=>input('author'),
                'keywords'=>input('keywords'),
                'desc'=>input('desc'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),
                'time'=>time(),
                'stime'=>input('stime'),
                'sstate'=>input('sstate'),
            ];
            //如果为on则为1，是否为置顶
            if(input('state')=='on'){
                $data['state']=1;
            }
            //上传pic缩略图
            // if($_FILES['pic']['tmp_name']){
            //     $file = request()->file('pic');
            //     $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
            //     $data['pic']='/uploads/'.$info->getSaveName();
            // }
            //独立验证器验证
            $validate = Loader::validate('Article');
    		//独立验证器判断
    		if (!$validate->scene('add')->check($data)) {
    			$this->error($validate->getError());
    			die;
			}
			//判断数据库名tp_admin是否添加了$data
    		if(DB::name('Article')->insert($data)){
    			return $this->success('添加文章成功！','lst');
    		}else{
    			return $this->error('添加文章失败！');
    		}
    		return;
    	}
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
    	return $this->fetch();

    }

    //修改模块 exit
    public function exit()
    {
        //option
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
        //查询
        $id=input('id');
        $Articles=db('Article')->find($id);

        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'title'=>input('title'),
                'author'=>input('author'),
                'desc'=>input('desc'),
                'keywords'=>input('keywords'),
                'content'=>input('content'),
                'cateid'=>input('cateid'),
                'stime'=>input('stime'),
                'sstate'=>input('sstate'),
            ];
            //状态state修改edit
            if(input('state')=='on'){
                $data['state']=1;
            }else{
                $data['state']=0;
            }
            // //上传pic缩略图
            // if($_FILES['pic']['tmp_name']){
            //     @unlink(SITE_URL.'/public/static'.$Articles['pic'])
            //     $file = request()->file('pic');
            //     $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
            //     $data['pic']='/uploads/'.$info->getSaveName();
            // }
            //独立验证器验证
            $validate = Loader::validate('Article');
            //独立验证器判断
            if (!$validate->scene('exit')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            //update db admin $data
            if(db('Article')->update($data)){
                $this->success('修改文章成功！','lst');
            }else{
                $this->error('修改文章成功！','lst');
            }
            return;
        }
        $this->assign('Articles',$Articles); //分配到模板中
        return $this->fetch();
    }
    public function del()
    {
        $id=input('id');
            if(db('Article')->delete(input('id'))){
                $this->success('删除文章成功！','lst');
            }else{
                $this->error('删除文章失败！');
            }
        
    }
}


