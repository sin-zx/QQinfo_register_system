<?php 
require_once('conn.php');
if(empty($_GET['type']){
    $type = 1;
}else{
  $type = intval($_GET['type']);
}
//$type = intval($_GET['type']) ? intval($_GET['type']) : 1;
$datas = $medoo-> select("info",array('id','title','area','intro'),array( 'AND'=> array("area_type" => $type,"isCheck" =>1) ) );
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>同乡会</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/jquery.mobile-1.4.5.css">
    <link rel="stylesheet" href="css/mytheme.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.mobile-1.4.5.js"></script>
<style type="text/css">
  .btn{
    width: 15%;
  }
</style>
</head>
<body>

<!-- 主页page1 -->
<div data-role="page" id="page1" data-theme='b'>
    <div data-role="header">
      <a href="index.php?type=1" data-icon="home">首页</a>
      <h1>找老乡</h1>
      <a href="index.php#register" data-icon="plus">申请加入</a>
    </div>
    <div data-role="content" class="ui-content">
      <ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="输入关键字查找">
          <?php if(empty($datas)) {  
            ?>
            <li>暂无QQ群入驻</li>
          <?php
           }else{ 
              foreach ($datas as $data) {
          ?>
            
             <div data-role="collapsible">
              <h1><?php echo $data['title'].'——'. $data['area']; ?></h1>
              <p><?php echo $data['intro']; ?></p>
              <a class='btn' data-role="button" href="detail.php?id=<?php echo $data['id']; ?>">查看详情</a>
              </div>
                <!-- <div data-role="collapsible">
                  
                </div> -->
              
              
            
          <?php 
            }
          } 
          ?>
      </ul>
    </div>

    <div data-role="footer" data-id="fixed-footer" data-position="fixed">
      <div data-role="navbar">
        <ul>
          <li><a href="?type=1" data-icon="star">广东省内</a></li>
          <li><a href="?type=2" data-icon="star">广东省外</a></li>
        </ul>
      </div>
    </div> 
</div> 


<!-- 登记页面 -->
<div data-role="page" id="register" data-theme='b' data-add-back-btn="true" data-back-btn-text="返回">
    <div data-role="header">
      <a href="index.php?type=1" data-icon="home">首页</a>
      <h1>找老乡</h1>
      <a href="index.php#register" data-icon="plus">申请加入</a>
    </div>

    <div data-role="content">
      <form action="register.php" method="post" target="_blank">
          <label for="title">* 群名（关键词）：</label>
          <input type="text" id="title" name="title">
          <label for="group_num">* 群号：</label>
          <input type="text" id="group_num" name="group_num">
          <label for="area">* 所在地区：</label>
          <input type="text" id="area" name="area">
          <div data-role="fieldcontainer">
            <label for="area_type">是否广东省内</label>
            <select data-role="slider" id="area_type" name="area_type">
              <option value="1">是</option>
              <option value="2">否</option>
            </select>
          </div>

          <label for="intro">简介：</label>
          <textarea  id="intro" name="intro"></textarea>
          <label for="applicant">申请人：</label>
          <input type="text" id="applicant" name="applicant">
          <label for="contact">* 联系方式：</label>
          <input type="text" id="contact" name="contact">
          <label for="sharelink">群分享链接（选填）：</label>
          <input type="text" id="sharelink" name="sharelink">
          <p>（注：分享链接可在QQ群设置里点'分享该群'后复制链接获取；标" * "号为必填项）</p>
          <input type="submit" value="提交">
      </form>
    </div>
    <div data-role="footer" data-id="fixed-footer" data-position="fixed">
      <h2>深大荔知&copy;2015</h2>
    </div>
</div>

</body>
</html>
