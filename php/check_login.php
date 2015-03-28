<?php
session_start();
?>
<html>
<style type=text/css>
body{background-color:brown};
a{color:yellow;}
</style>
<body>
<?php
if(isset($_POST['submit'])){
$con = mysql_connect("localhost","root","44422");
if(!$con)
{
echo "Database Can Not Be Connected".mysql_error();
}
mysql_select_db("hobby",$con);
$email=$_POST["email"];
$password =$_POST["password"];
$result=mysql_query("SELECT * FROM security WHERE email='$email' and password='$password'");
$count=mysql_num_rows($result);
if($count==1){
$_SESSION['email']=$email;
//$_SESSION['password']=$password;
//echo $_SESSION['email'];

header('location:../index.php');

}
else {
echo "Wrong Email or Password";
}
}
?>
</body>
</html>
