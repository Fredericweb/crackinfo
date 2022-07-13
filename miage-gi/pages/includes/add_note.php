<?php
    session_start();
    
    include('../../../config.php');

    if(isset($_POST['save']))
      {
         $idadmin = $_POST['idadmin'];
         $idpart = $_POST['idpart'];
         $idspe = $_POST['idspe'];
         $note =  $_POST['note'];

         if($note<0 || $note>20){
            echo"<script>alert('la note doit etre compris entre 0 et 20');</script>";
         }else{
            $rq = mysqli_query($con,"INSERT INTO note(idPart,idSpe,idAdmin,note) VALUES
            ('$idpart','$idspe','$idadmin','$note')");
            echo"<script>alert('Information enregistée');</script>";
         }
      }

     
?>

<script language="javascript">
document.location="../GrpPassD.php";
</script>