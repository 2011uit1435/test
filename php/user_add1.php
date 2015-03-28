<html>
<style>
#add1{text-align:center;margin-top:-130px;margin-left:400px}
</style>
<body>
<div id="add1">
<?php
$con=mysql_connect("localhost","root","44422");
mysql_select_db("hobby",$con);
$fullname=$_POST["fullname"];
$password=$_POST["password"];
$email=$_POST["email"];

if((($fullname=="")||($email=="")|| ($password=="")))
{
  echo '<h3>Please fill all entries</h3>';
  exit();
}
$sql=mysql_query("select email from users where email='$email' ");
$result=mysql_num_rows($sql);
if($result!=0)
{  echo "<h3>Email Id already exists</h3>";
   exit();
   }
   $sql="insert into users (fullname,email,password) 
                  values
                ('$fullname','$email','$password')";
	$sql1="insert into security (email,password) values ('$email','$password')";			
    if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
  if (!mysql_query($sql1))
  {
  die('Error: ' . mysql_error());
  }
	echo '<h3>Information is sucessfully added</h3>';
	header('index.html');
	mysql_close($con);
?>
</div>
</body>
</html>
