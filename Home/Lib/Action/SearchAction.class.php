<?php
// 本类由系统自动生成，仅供测试用途
class SearchAction extends Action {
    public function search(){
    	$keyword = $_GET['keyword'];
    	$this->addSearch($keyword);
    	$this->assign("keyword" , $keyword);


    	import('ORG.Util.Page');// 导入分页类
    	$m = M("Articles");
    	$where['title'] = array("like" , "%$keyword%");
    	$where['content'] = array("like" , "%$keyword%");
    	$where['tags'] = array("like" , "%$keyword%");
    	$where['_logic'] = 'OR';
    	$count = $m->where($where)->count();
    	$page  = new Page($count,10);//
			
			
		$page->setConfig('header','条信息');
		$show=$page->show();//返回分页信息
    	$list = $m->where($where)->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
    	
    	$total = count($list);
    	for ($i=0; $i < $total; $i++) { 
    		$list[$i]['title'] = preg_replace("/($keyword)/i", "<font color=red><strong>\\1</strong></font>", $list[$i]['title']);
    		$list[$i]['tags'] = preg_replace("/($keyword)/i", "<font color=red><strong>\\1</strong></font>", $list[$i]['tags']);
    		$list[$i]['summary'] = preg_replace("/($keyword)/i", "<font color=red><strong>\\1</strong></font>", $list[$i]['summary']);
    	}
   	
    	//dump($list); 
    	$this->assign("count", $count);
    	$this->assign("result", $list);
    	$this->assign("show" , $show);

    	$m = M("Sword");
    	$rankSearch = $m->query("select name , num from __TABLE__ GROUP BY name order by num desc,lasttime DESC limit 5; ");
    	$sumSearch = $m->sum('num');
    	//dump($sumSearch);
    	$this->assign("rSearch",$rankSearch);
    	$this->assign("sSearch",$sumSearch);

    	$this->display("search");
    }

    private function addSearch($keyword){
    	$m = M("Sword");
    	$where['name'] = array("like" , "%$keyword%");

		$count = $m->where($where)->select();    
		if($count>0){
			$m->where($where)->setInc('num',1);
		}else{
			$where2['name'] = $keyword;
			$where2['num'] = 1;
			$where2['lasttime'] = date('Y-m-d H:i:s',time()); //H输出24小时值，h输出12小时值
			$m->add($where2);

		}


    }

    
}
?>