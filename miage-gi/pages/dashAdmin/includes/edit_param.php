<?php
    session_start();
    
    include '../../../../config.php';
    //error_reporting(0);
    if(isset($_POST['save']))
      {
         $idAdmin=$_SESSION['idAdmin'];
         $fin=$_POST['finIns'];
         $prepa=$_POST['preparation'];
         $id = 1;

         $datDebut = date_create($fin);
         date_add($datDebut,date_interval_create_from_date_string("$prepa days"));
         $debut = date_format($datDebut,"Y-m-d");
         
         $sql = mysqli_query($con,"Update  parametre set finInscrpt  ='$fin', preparation ='$prepa',debutEvent='$debut' where id='$id'");
         echo "<script>alert('modifications enregistrées');</script>";
      }
    
?>
<script language="javascript">
document.location="../index.php";
</script>

