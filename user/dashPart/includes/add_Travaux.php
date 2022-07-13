<?php
    session_start();
    
    include '../../../config.php';
    //error_reporting(0);
    if(isset($_POST['save']))
      {
     
         $idPart = $_SESSION['idPart'];
         $idspe = $_POST['spe']; 
         $travaux = $_POST['Travaux'];
         $sql = mysqli_query($con,"INSERT INTO travaux(idPart,idSpe,Travaux)VALUES('$idPart','$idspe','$travaux')");
         echo "<script>alert('modifications enregistrées');</script>";
         
      }
    
?>
<script language="javascript">
document.location="../index.php";
</script>

