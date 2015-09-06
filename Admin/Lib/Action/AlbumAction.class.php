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
        $where['typeid'] = $typeid;
        
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
        $albumtype = M("Albumtype");
        $albumTypelist = $albumtype->field("id , name ,imgnum")->select();
        $this->assign("albumTypeList",$albumTypelist);
        //dump($albumTypelist);
        $this->display();
    }

    // public function uploadImg(){
    //     $title = $_POST['title'];

    //     import('ORG.Net.UploadFile');
    //     $upload = new UploadFile();// 实例化上传类
    //     $upload->maxSize   =     3145728 ;// 设置附件上传大小
    //     //$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    //     $upload->savePath =  C('ALBUMTYPE_UPLOAD_PATH');// 设置附件上传目录
        
    //     // 上传文件 
    //     $info   =   $upload->uploadOne($_FILES['weixin_image']);
    //     if(!$info) {// 上传错误提示错误信息
    //         //$this->error($upload->getError());
    //         echo 0;
    //     }else{// 上传成功 获取上传文件信息
    //         //$this->display('templateList');
    //         //echo "Uploads/".$info['savepath'].$info['savename'];
    //         echo "name: ".$name;
    //     }
    // }

    public function saveUpload(){
        if(!isset($_POST['typeid'])){
            exit("您未选择照片所属相册。");
        }

        if(empty($_FILES)){
            exit("您未选择上传的照片。");
        }

        $typename = $_POST['typename'];
        $typeid = $_POST['typeid'];

        $d = D('Album');
        $d->create();

        $d->title = $_POST['title'] == "" ? $typename : $_POST['title']; 
        $d->alt = $_POST['alt'] == "" ? $typename : $_POST['alt']; 
        
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->savePath =  C('PICTURE_UPLOAD_PATH');// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            //print_r($info);
        }
        $d->link = C('PICTURE_SAVE_PATH').$info[0]['savename'];
        $lastId=$d->add();
        if($lastId){
            $this->incTypeNum($typeid);
            echo "1";
        }else{
            echo '上传失败';
        }
        //echo "lastId: $lastId";

        //print_r($_FILES);

        // if($lastId){
        //     echo '上传成功';
        // }else{
        //     echo '相册创建失败';
        // }
    }

    protected function incTypeNum($typeid){
        $m = M("Albumtype");
        $where['id'] = $typeid;
        $m->where($where)->setInc('imgnum',1); 
    }

    protected function decTypeNum($typeid){
        $m = M("Albumtype");
        $where['id'] = $typeid;
        $m->where($where)->setDec('imgnum',1); 
    }

    public function deletePicture(){
        if(isset($_POST['id'])){
            $m = M("Album");
            $where['id'] = $_POST['id'];
            $delnum = $m->where($where)->delete();
            if($delnum){
                $typeid = $_POST['typeid'];
                $this->decTypeNum($typeid);
                echo "删除成功！";
            }else{
                echo "删除失败";
            }

        }else{
            exit("非法操作！");
        }
    }

    public function updatePicture(){
        $id = $_POST['pid'];
        $typeid = $_POST['tid'];
        $title = $_POST['title'];
        $alt = $_POST['alt'];
        $m = M('Album');
        $data['id'] = $id;
        $data['title'] = $title;
        $data['alt'] = $alt;

        $updatenum = $m->save($data);
        if($updatenum === false){
            $this->error("更新出错123");
        }else{
            $this->redirect('editAlbum',array('type'=>$typeid));
        }

    }

    public function upload() { 
        if (!empty($_FILES)) { 
            //如果有文件上传 上传附件 
            $this->_upload(); 
            //$this->forward(); 
        } 
    } 
    // 文件上传 
    protected function _upload() { 
        import('ORG.Net.UploadFile');
        //导入上传类 
        $upload = new UploadFile(); 
        //设置上传文件大小 
        $upload->maxSize = 3292200; 
        //设置上传文件类型 
        $upload->allowExts = explode(',', 'jpg,gif,png,jpeg'); 
        //设置附件上传目录 
        $upload->savePath = C('THUMB_UPLOAD_PATH'); 
        //设置需要生成缩略图，仅对图像文件有效 

        $upload->thumb = true; 
        // 设置引用图片类库包路径 
        //$upload->imageClassPath = 'ORG.Util.Image'; 
        //设置需要生成缩略图的文件前缀 
        $upload->thumbPrefix = 'm_,s_';  //生产2张缩略图 
        //设置缩略图最大宽度 
        $upload->thumbMaxWidth = '400,100'; 
        //设置缩略图最大高度 
        $upload->thumbMaxHeight = '400,100'; 
        //设置上传文件规则 
        //$upload->saveRule = uniqid; 
        //删除原图 
        $upload->thumbRemoveOrigin = flase; 
        if (!$upload->upload()) { 
            //捕获上传异常 
            $this->error($upload->getErrorMsg()); 
        } else { 
            //取得成功上传的文件信息 
            $uploadList = $upload->getUploadFileInfo(); 
            //print_r($uploadList);
            // import("@.ORG.Image"); 
            // //给m_缩略图添加水印, Image::water('原文件名','水印图片地址') 
            // Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], '/thinkphp/examples/File/Tpl/Public/Images/logo2.png'); 
            // $_POST['image'] = $uploadList[0]['savename']; 
        } 
        
        
    } 
}
?>