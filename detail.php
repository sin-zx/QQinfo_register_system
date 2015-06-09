<?php 
require_once('conn.php');
$id = $_GET['id'];
$datas = $medoo-> select("info",'*',array("id" => $id));
if (empty($datas)) {
  die('出错！');
}
$data = $datas[0];
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.css">
    <link rel="stylesheet" href="css/mytheme.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.4.5.js"></script>
<style type="text/css">
</style>
</head>
<body>

<div data-role="page" id="page1" data-theme='b' data-add-back-btn="true" data-back-btn-text="返回">

    <div data-role="header">
      <a href="index.php?type=1" data-icon="home">首页</a>
      <h1>找老乡</h1>
      <a href="index.php#register" data-icon="plus">申请加入</a>
    </div>
    <div data-role="content" class="ui-content">
      <div class="content">
        <h1>群名：<?php echo $data['title']; ?> </h1>
        <h1>简介：</h1>
        <h2> &nbsp;&nbsp;<?php echo $data['intro']; ?></h2>
        <h1>所在地：<?php echo $data['area']; ?></h1>
        <h1>群号：<?php echo $data['group_num']; ?></h1>
        <?php if(!empty($data['sharelink'])){ ?>
        <a href="<?php echo $data['sharelink']; ?>" data-role="button">点此直达</a>
        <p>（注：此功能仅支持较新版本的QQ）</p>
        <?php } ?>

      </div>
    </div>

    <div data-role="footer">
      <h2>深大荔知&copy;2015</h2>
    </div> 

</div> 
</body>
</html>
