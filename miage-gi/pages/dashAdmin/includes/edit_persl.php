<?php
    session_start();
    
    include '../../../../config.php';
    //error_reporting(0);
    if(isset($_POST['save']))
      {
     
         $idAdmin=$_SESSION['idAdmin'];
         $uname=$_POST['login'];
         $password=$_POST['password'];
         $cpassword=$_POST['Cpassword'];

         if($password == $cpassword){
            $sql = mysqli_query($con,"Update  admininfo set login='$uname',password='$password' where idAdmin='$idAdmin'");
            echo "<script>alert('modifications enregistrées');</script>";
         }else{
            echo "<script>alert('mot de passe ne correspond pas');</script>";
         }
         
      }
    
?>
<script language="javascript">
document.location="../index.php";
</script>

