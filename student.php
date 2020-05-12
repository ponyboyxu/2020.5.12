<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * class Student 以学生为主体的查询操作类
 */
class Student extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//加载模型
		$this->load->model('student_model');
	}

	//查询选了课程1且没选课程2的学生信息
	public function get_student_message()
	{
		//获取查询条件
		$Cid_1=$_POST['Cid_1'];
		$Cid_2=$_POST['Cid_2'];
		//$Cid_1='01';
		//$Cid_2='02';
		
		//加载model中的方法
		$data=$this->student_model->get_student_message($Cid_1,$Cid_2);
		$json_after=json_encode($data);
		echo "<pre>";
		//echo $json_after; 
        var_dump($json_after);

	}

	//查询某一年出生的学生的信息
	public function get_sname_sage()
	{
		//$bir_year='1990';
		$bir_year=$_POST['bir_year'];
		//加载model中的方法
		$data=$this->student_model->get_sname_sage($bir_year);
		$json_after=json_encode($data);
		echo "<pre>";
		//echo $json_after; 
        var_dump($json_after);
	}


		//增加一名学生的信息
		public function add_student_message()
	{

		$SID=$_POST['SID'];
		$Sname=$_POST['Sname'];
		$Sage=$_POST['Sage'];
		$Ssex=$_POST['Ssex'];
		$data=$this->student_model->add_student_message($SID,$Sname,$Sage,$Ssex);
		$json_after=json_encode($data);
		echo "<pre>";
		echo $json_after; 
		
		
        //var_dump($json_after);
	}	

	//删除一名学生的信息
	public function delete_student_message()
	{
		if (isset($_POST['SID']) && !empty($_POST['SID'])) 
		{
			
			$SID=$_POST['SID'];
			$data=$this->student_model->delete_student_message($SID);
			$json_after=json_encode($data);
			echo "<pre>";
			echo $json_after; 
		}else{
			echo json_encode('删除失败，请输入有效值');
		}
		
        //var_dump($json_after);
	}

	//修改学生的信息
	public function update_student_message()
	{
		//执行修改年龄的方法					
		if(isset($_POST['Sage']) && !empty($_POST['Sage']))
		{
			$Sage=$_POST['Sage'];
			$Sid=$_POST['Sid'];
			$data=$this->student_model->update_student_age($Sage,$Sid);
			$json_after=json_encode($data);
		
		}
		
		
		//执行修改性别的方法
		if(isset($_POST['Ssex']) && !empty($_POST['Ssex']))
		{
			$Ssex=$_POST['Ssex'];
			$Sid=$_POST['Sid'];
			$data=$this->student_model->update_student_sex($Ssex,$Sid);
			$json_after=json_encode($data);
		
		}

		//执行修改姓名的方法
		if(isset($_POST['Sname']) && !empty($_POST['Sname']))
		{
			$Sname=$_POST['Sname'];
			$Sid=$_POST['Sid'];
			$data=$this->student_model->update_student_name($Sname,$Sid);
			$json_after=json_encode($data);
		}
		echo "<pre>";
		echo $json_after; 
		
	}
	
		  
}