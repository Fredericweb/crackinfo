<?php
 session_start();

 include "../../config.php";

if(isset($_POST['connexion']))
  {

     $uname=$_POST['login'];
     $password=$_POST['password'];


$sql = mysqli_query($con,"SELECT * FROM user WHERE (login='$uname')");
 $num=mysqli_fetch_array($sql);
if($num>0)
{

if ($password == $num['password']) {
    $_SESSION['idPart']=$num['idPart'];
    echo "<script type='text/javascript'> document.location = '../dashPart/index.php'; </script>";
} else {
    echo "<script>alert('mot de passe incorrect');</script>";
  }
}

else{
echo "<script>alert('nom d'utilisateur incorrect');</script>";
  }
 
}
?>