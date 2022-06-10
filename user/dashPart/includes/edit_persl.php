<?php
    session_start();
    
    include '../../../config.php';
    //error_reporting(0);
    if(isset($_POST['save']))
      {
     
         $idPart=$_SESSION['idPart'];
         $uname=$_POST['login'];
         $password=$_POST['password'];
         $cpassword=$_POST['Cpassword'];

         if($password == $cpassword){
            $sql = mysqli_query($con,"Update  user set login='$uname',password='$password' where idPart='$idPart'");
            echo "<script>alert('modifications enregistrées');</script>";
         }else{
            echo "<script>alert('mot de passe ne correspond pas');</script>";
         }
         
      }
    
?>
<script language="javascript">
document.location="../index.php";
</script>

