<?php
$connect = mysqli_connect("yourMySQLhost", "yourMySQLuserID", "yourMySQLpassword", "yourMySQLdatabasename");
if(mysqli_connect_errno()){echo '<p>Connection to MySQL server [yourMySQLhost] failed: '.mysqli_connect_error().'</p>';}
