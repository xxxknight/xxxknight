<?php
class AlbumAction extends CommonAction {
    public function index(){
    	$this->display();
    }

    public function createAlbum(){
        $this->display();
    }

    public function saveAlbum(){
        $d = D('Albumtype');
        $d->create();

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->savePath =  C('ALBUMTYPE_UPLOAD_PATH');// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        $d->coverImg= C('ALBUMTYPE_COVER_PATH').$info[0]['savename'];
            
        $lastId=$d->add();
        if($lastId){
            $this->success('相册创建成功');
        }else{
            $this->error('相册创建失败');
        }

    }

    public function updateAlbum(){
        if(isset($_POST['id'])){
            $m = M('Tag');
            $where['id'] = $_POST['id'];

            $data['name'] = $_POST['name'];
            $data['type'] = $_POST['type'];
            $data['flag'] = $_POST['flag'];

            $updateNum = $m->where($where)->save($data);

            if($updateNum){
                echo "更新成功";
            }else{
                exit("您未做任何更新！");
            }
        }else{
            exit("非法操作！");
        }

    }

    public function deleteAlbum(){
    	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where['id'] = $id;
			$m = M("Tag");
			$deleteNum = $m->where($where)->delete();
			if($deleteNum){
				echo "删除成功！";
			}else{
				exit("删除失败！");
			}

		}else{
			exit("非法操作！");
		}

    }

    public function listAlbum(){

		$page = intval($_GET['pageNum']);

		$m = M('Tag');
        
		$total = $m->count();
		$pageSize = 20; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数
		$startPage = $page*$pageSize;

		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;

		$list= $m->order("id desc")->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);

    }

    public function manageAlbum(){
        $albumtype = M("Albumtype");
        $albumTypelist = $albumtype->select();
        $this->assign("albumTypeList",$albumTypelist);
        $this->display();
    }

    public function editAlbum(){
        $typeid = $_GET['type'];
        $where['id'] = $typeid;
        $m = M('Albumtype');
        $album = $m->where($where)->find();
        $picturelist = $this->findPicById($typeid);

        $this->assign("album",$album);
        $this->assign("picturelist",$picturelist);
        $this->display();
    }

    public function findPicById($typeid){
        $m = M('Album');
        $where['typeid'] = $typeid;
        $picturelist = $m->where($where)->select();
        return $picturelist;
    }

    public function updatePicture(){
        $id = $_POST['pid'];
        $this->redirect("manageAlbum");
    }

    public function saveUpdateAlbum(){
        $m = M("Albumtype"); 
        // 要修改的数据对象属性赋值
        $where['id'] = $_POST['albumid'];
        $data['name'] = $_POST['name'];
        $data['summary'] = $_POST['summary'];
        //判断是否选择图片

        if(!empty($_FILES['cover']['tmp_name'])){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->savePath =  C('ALBUMTYPE_UPLOAD_PATH');// 设置附件上传目录
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }
            $data['coverImg'] = C('ALBUMTYPE_COVER_PATH').$info[0]['savename'];
            
            $updatenum = $m->where($where)->data($data)->save(); // 根据条件保存修改的数据
            if($updatenum){
                $this->error("更新成功！","__URL__/editAlbum/type/".$_POST['albumid']);
            }else{
                $this->error("您未做任何更新！","__URL__/editAlbum/type/".$_POST['albumid']);
            }
        }else{
            
            $updatenum = $m->where($where)->data($data)->save(); // 根据条件保存修改的数据
            if($updatenum){
                $this->error("更新成功！","__URL__/editAlbum/type/".$_POST['albumid']);
            }else{
                $this->error("您未做任何更新！","__URL__/editAlbum/type/".$_POST['albumid']);
            }
        }
    }

}
?>