<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){
    	$Account = M("Account");
    	$accountNum = $Account->count();
    	//dump($accountNum);
    	$this->assign("accountNum",$accountNum);

    	$onlineNum = countOnline();
    	$this->assign("onlineNum",$onlineNum);

    	$press = round($onlineNum/$accountNum*100,2);
    	$this->assign("press",$press);

        $setting = M("Setting");
        $sets = $setting->select();
        

        $author = $setting->field("value")->where("name='author'")->find();
        
        $this->assign("author" , $author);

        $createtime = $setting->field("value")->where("name='createtime'")->find();
        
        $this->assign("createtime" , $createtime);

        $version = $setting->field("value")->where("name='version'")->find();
        
        $this->assign("version" , $version);

        $this->assign("apache" , apache_get_version());
        $this->assign("db" , mysql_get_server_info());
        $this->assign("php_version" , phpversion());
        $this->assign("os_version" ,php_uname('s').php_uname('r'));
    	$this->display();
    }
    
    public function show(){
    	//echo "欢迎你".$_GET['name']."年龄".$_GET['age'];
    }
}

?>