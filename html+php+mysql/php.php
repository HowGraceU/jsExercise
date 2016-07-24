<?php
  header("Content-Type:text/html;charset=utf-8");//设置网页编码
  ini_set('date.timezone', 'Asia/Shanghai');//设置时区

  if(!isset($_POST['name'])){
    echo '无权访问';
    exit;//结束程序
  }

  $name=$_POST['name'];
  $password=$_POST['password'];
  $time=date('Y-m-d H:i:s');

  $connect=mysql_connect('localhost','root','');//链接数据库服务器port，用户名，密码
  /**数据库链接测试**/
  // if(!$connect){//没连上
  //   die('连不上'.mysql_error());
  // }else{//连上了
  //   echo $connect;
  // }

  mysql_query('set names "utf8"');//设置数据库编码
  mysql_select_db('reg', $connect);//链接数据库

  $fanhui=mysql_query("insert into jqxreg (name,password,time) values ('$name','$password','$time')");

  if($fanhui){
    echo "注册成功 <input type=\"button\" value=\"返回\" onclick=\"window.history.go(-1);\" />";
  }
?>