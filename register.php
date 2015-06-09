<?php
header("Content-type: text/html; charset=utf-8");
require_once('conn.php');
$title=$_POST['title'];
$group_num=$_POST['group_num'];
$area=$_POST['area'];
$area_type=intval($_POST['area_type']);
$intro=$_POST['intro'];
$applicant=$_POST['applicant'];
$contact=$_POST['contact'];
$sharelink=$_POST['sharelink'];
if(empty($title) || empty($area) || empty($group_num)  || empty($contact)){
	echo "<script>alert('信息不完整，请重新填写');history.go(-1);</script>";
}
else if(!intval($group_num)){
	echo "<script>alert('请输入正确的群号');history.go(-1);</script>";
}else{
	$query= $medoo->insert('info', array("title"=>$title,"group_num"=>$group_num,"area"=>$area,
		"area_type"=>$area_type,"intro"=>$intro,"applicant"=>$applicant,"contact"=>$contact ,"sharelink"=>$sharelink));
	if(!$query){
		echo "<script>alert('登记失败！请重试');history.go(-1);</script>";
	}else{
		echo "<script>alert('登记成功！请等待管理员审核');window.location.href='index.php';</script>";
	}
}
?>