<?php
class ArticleAction extends Action {
	public function index() {
		$this->display ();
	}

	public function showArticles(){
		$keywords = M('Keyword');
		$where['flag']=1;
		$wordlist = $keywords->where($where)->field('name,value')->order("value desc")->select();
		$this->assign("wordlist",json_encode($wordlist));

		$articlestype = M('articlestype');
		$typelist = $articlestype->order("typenum desc")->select();
		$temp = M("Articles");
		$totalnum = $temp->count();
		//dump($typelist);
		$this->assign("totalnum",$totalnum);
		$this->assign("typelist",$typelist);

		$ranklist = $temp->field("id,title,viewnum")->order("viewnum desc")->limit(5)->select();
		//dump($ranklist);
		$this->assign("ranklist",$ranklist);

		$newlist = $temp->field("id,title")->where("flag=1")->order("createtime desc")->limit(5)->select();
		$this->assign("newlist",$newlist);
        //dump($newlist);

		if(isset($_GET['type'])){
			$articles = M("Articles");
			import('ORG.Util.Page');// 导入分页类
			$type = $_GET['type'];
			$where_type['typeid'] = $type;
			$count= $articles->where($where_type)->count();//获取数据的总数
			$page  = new Page($count,15);//
			
			$page->setConfig('header','条数据');
			$show=$page->show();//返回分页信息
			
			$article_list=$articles->where($where_type)->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('type',$type);
	        $this->assign('art_list',$article_list);
			$this->assign('show',$show);
		}else{
			$articles = M("Articles");
			import('ORG.Util.Page');// 导入分页类
			$count= $articles->count();//获取数据的总数
			$page  = new Page($count,15);//
			
			$page->setConfig('header','条数据');
			$show=$page->show();//返回分页信息
			
			$article_list=$articles->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
			//dump($article_list);
			$this->assign('type',"0");
			$this->assign('art_list',$article_list);
			$this->assign('show',$show);
		}

		$this->display ();
	}

	public function detailArt(){
		
		$id=$_GET['id'];
		$article= M('Articles');
		$where['id']=$id;
		$art= $article->where($where)->find();
		//dump($art);

		$prev = $this->selectPrevOne($id);
		//dump($prev);
		if($prev){
			$this->assign("prev", $prev);
		}

		$after = $this->selectAfterOne($id);
		if($after){
			$this->assign("after",$after);
		}
		
		$this->assign('detail',$art);
		$this->display("detail");
	}

	public function selectPrevOne($id) {
		$m = M("Articles");
		$sql_prev = "select * from __TABLE__ where id = (select id from __TABLE__ where id < $id order by id desc limit 1);";
        $arr = $m->query($sql_prev);
        return $arr[0];
	}

	public function selectAfterOne($id) {
		$m = M("Articles");
		$sql_after = "select * from __TABLE__ where id = (select id from __TABLE__  where id > $id order by id asc limit 1);";
        $arr = $m->query($sql_after);
        return $arr[0];
	}

	public function showAcomment(){
		$aid=intval($_GET['aid']);
		$page = intval($_GET['pageNum']);

		$where['aid']=$aid;
		$ac = M('Acomment');
        
		$total = $ac->where($where)->count();
		$pageSize = 6; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数
		$startPage = $page*$pageSize;

		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;

		$list= $ac->where($where)->order('createtime desc')->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);

	}

	public function submitComment(){
		if(!session("?username")){
			exit("您尚未登陆，请登陆后操作！");
		}
		$acomment = D ( 'Acomment' );
		$acomment->create ();
		$lastId = $acomment->add ();
		if ($lastId) {
			echo "提交评论成功.";
		} else {
			exit($acomment->getError());
		}
	}
}



?>