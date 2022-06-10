<?php
    session_start();
    include('config.php');

    if(isset($_POST['save'])){

        $role = $_POST['role'];
        $mdp = $_POST['mdp'];

        // recuperation des informations de l'utilisateur
        $id = $_POST['id_user'];
        $row1 = mysqli_query($con, "SELECT * FROM admininfo WHERE idAdmin = '$id'");
        $rst1 = mysqli_fetch_array($row1);

        
        $row2 = mysqli_query($con, "SELECT * FROM role WHERE libRole='$role'");
        $rst2 = mysqli_fetch_array($row2);
        $idr = $rst2['idRole'];

        $query = mysqli_query($con,"update admininfo set password='$mdp',idRole='$idr'
        where idRoler='$id'");
        echo "<script>alert('Informations modifiées !!!');</script>";
    }
?>
<script language="javascript">
document.location="../List_persl.php";
</script>