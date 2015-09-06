<?php
class AlbumAction extends Action {
    public function index(){
    	$this->display("showPicture");
    }

    public function showPicture(){
    	$album = M("Album");
		$arr = $album->select();
		$json_data = json_encode($arr);
		$this->assign("data",$json_data);
    	$this->display("showPicture");
    }

    public function showAlbum(){
        $album = M("Album");
        if(isset($_GET['type'])){
            $typeid= $_GET['type'];
            $where['typeid'] = $typeid;
            $list = $album->where($where)->select();
            $previd = $this->selectPrevType($typeid);
            $lastid = $this->selectAfterType($typeid);
            $this->assign("previd",$previd);
            $this->assign("lastid",$lastid);
        
        }else{
            $list = $album->select();

        }
        $this->assign("list",$list);
        
        $this->display("showPicture");
    }

    public function albumlist(){
        $album = M("Album");
        $list = $album->order('id desc')->limit(10)->select();
        
        $this->assign("list",$list);

        $albumTypeList = $this->selectAlbumType();

        $this->assign("albumTypeList",$albumTypeList);

        $this->display();

    }

    public function selectAlbumType(){
        $albumtype = M("Albumtype");
        $list = $albumtype->select();
        return $list;
    }

    public function selectPrevType($id){
        $m = M("Albumtype");
        $sql_prev = "select id from __TABLE__ where id = (select id from __TABLE__ where id < $id order by id desc limit 1);";
        $arr = $m->query($sql_prev);
        if(!$arr){
            $arr = $this->selectLastType();
            return $arr["id"];
        }else{
            return $arr[0]["id"];
        }
    }

    public function selectAfterType($id){
        $m = M("Albumtype");
        $sql_after = "select id from __TABLE__ where id = (select id from __TABLE__  where id > $id order by id asc limit 1);";
        $arr = $m->query($sql_after);
        if(!$arr){
            $arr = $this->selectFirstType();
            return $arr["id"];
        }else{
            return $arr[0]["id"];
        }
    }

    public function selectFirstType(){
        $m = M("Albumtype");
        $arr = $m->field("id")->order("id asc")->find();
        return $arr;

    }

    public function selectLastType(){
        $m = M("Albumtype");
        $arr = $m->field("id")->order("id desc")->find();
        return $arr;

    }
    
}
?>