<?php 
 
// include("Constants.php");
// ob_start();
// session_start();

 // Create connection
$con=mysqli_connect("localhost","root","password","Twitter");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$username = $_POST['username'];
$password = $_POST['password'];

 $sql = "SELECT * FROM  user"; 
 
$sql_check = mysqli_query($con,"select * from user where username='".$username."' and password='".$password."' ") or die(mysqli_error());
 
if(mysqli_num_rows($sql_check)){
   // $_SESSION["login"] = "true";
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
  //  header("Location:admin.php");
    echo "kullanıcı doğru";
}
else if($username=="" or $password=="") {
        echo "Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! ";
    }
    else {
        echo "kullanici Adi/Sifre Yanlis.";
    }

 
ob_end_flush();

?>