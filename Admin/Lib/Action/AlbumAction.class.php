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

    public function deleteAlbum(){
    	if(isset($_GET['id'])){
			$id = $_GET['id'];

            if($this->deletePicturesByTypeid($id) === false){
                exit("删除失败！");
            }else{
                $where['id'] = $id;
                $m = M("Albumtype");
                $deleteNum = $m->where($where)->delete();
                if($deleteNum){
                    echo "删除成功！";
                }else{
                    exit("删除失败！");
                }
            }
		}else{
			exit("非法操作！");
		}
    }

    private function deletePicturesByTypeid($typeid){
        $m = M("Album");
        $where['$typeid'] = $typeid;
        
        $deletePicNum = $m->where($where)->delete();
        return $deletePicNum;

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


    public function uploadPic(){
        $this->display();
    }

    public function uploadImg(){
        $name = $_POST['name'];

        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        //$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  C('ALBUMTYPE_UPLOAD_PATH');// 设置附件上传目录
        
        // 上传文件 
        $info   =   $upload->uploadOne($_FILES['weixin_image']);
        if(!$info) {// 上传错误提示错误信息
            //$this->error($upload->getError());
            echo 0;
        }else{// 上传成功 获取上传文件信息
            //$this->display('templateList');
            //echo "Uploads/".$info['savepath'].$info['savename'];
            echo "name: ".$name;
        }
    }

}
?>