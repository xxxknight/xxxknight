<?php
class ExportAction extends Action {
	public function index() {
		$tables = $this->showTables();
		$this->assign("tables" , $tables);
		//dump($tables);
		$this->display();
	}

	public function about() {
		$this->display();
	}

	public function export(){
		if(isset($_GET['flag'])){
			$flag = $_GET['flag'];
			switch ($flag) {
				case '10':
					$this->exportToExcel1($_GET['starttime'],$_GET['endtime']);
					break;
				case '11':
					exportToTxt1($_GET['starttime'],$_GET['endtime']);
					break;
				
				default:
					# code...
					break;
			}

		}else{
			exit("非法操作！");
		}
		

	}

	public function exportToExcel1($starttime,$endtime) {

		$m = M('Account');
		$where['createtime'] = array(array('egt',$starttime),array('elt',$endtime));
		$list = $m->field('password',true)->where($where)->select();
		//dump($list);


		$savename = "用户数据-".date('YmjHis');
		$file_type = "vnd.ms-excel"; 
		$file_ending = "xls"; 
		header("Content-Type: application/$file_type;charset=utf8"); 
		header("Content-Disposition: attachment; filename=".$savename.".$file_ending"); 
		$now_time = date("YmjHis");
		echo "title: accountInfo"."\t"."export-time:$now_time\n";


		if($starttime !=""){
			echo "starttime: $starttime"."\t";

		}
		if($endtime !=""){
			echo "endtime: $endtime"."\t";
		}
		echo "\n";

		if($list){
			$field = array_keys($list[0]);
			foreach($field as $value){
				echo $value."\t";

			}
			echo "\n";
			$seq = "\t";
			for($i=0 ; $i<count($list);$i++){
				$data="";
				foreach ($list[$i] as $value) {
					if(!isset($value)){
						$data .= "NULL".$seq;
					}elseif ($value != ""){
						$data .="$value".$seq;
					}else{
						$data .= "".$seq;
					}
					
				}
				echo $data."\n";
			}

		}else{
			echo "empty";

		}
	}

	public function exportToTxt1(){

	}

	public function exportToSql(){


	}

	private function showTables(){
		$sql = "select TABLE_NAME as t from INFORMATION_SCHEMA.TABLES  where TABLE_SCHEMA='".C('DB_NAME')."';";
		$Model = new Model(); // 实例化一个model对象 没有对应任何数据表
		$tables = $Model->query($sql);
		return $tables;
	}
}

?>