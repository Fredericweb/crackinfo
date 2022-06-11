<?php
    session_start();
    
    include('../../../config.php');

    if(isset($_POST['save']))
      {
         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];
         $password=$_POST['password'];
         $cpassword=$_POST['Cpassword'];
         $photo = $_POST['photo']; 

        //  recuperation de id_role
         $role = $_POST['role'];
         $row2 = mysqli_query($con, "SELECT * FROM role WHERE libRole='$role'");
         $rst2 = mysqli_fetch_array($row2);
         $idr = $rst2['idRole'];

         //  recuperation de id_sex
         $sexe = $_POST['sexe'];
         $row0 = mysqli_query($con, "SELECT * FROM sexe WHERE libSexe='$sexe'");
         $rst0 = mysqli_fetch_array($row0);
         $ids = $rst0['idSexe'];

        //  creation du login 
         $loginBrut= "$nom$prenom";
         $login = substr( $loginBrut, 0, 8 );

         if($password == $cpassword){
            $rq = mysqli_query($con,"INSERT INTO admininfo(nom,prenom,idRole,idSexe,photo,login,password) VALUES
            ('$nom','$prenom','$idr','$ids','$photo','$login','$password')");

            echo "<script>alert('modifications enregistrées');</script>";
         }else{
            echo "<script>alert('mot de passe ne correspond pas');</script>";
         }
        
   
      }

     
?>

<script language="javascript">
document.location="../ListPersl.php";
</script>